<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\CompanyDatabase;
use App\Models\ApplicantsApplication;
use App\Models\JobPosting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /**
     * Start a new conversation or retrieve existing one
     */
    public function startConversation(Request $request)
{
    $request->validate([
        'applicant_id' => 'required|exists:applicants_applications,id',
        'client_id' => 'required|exists:company_databases,id',
        'job_id' => 'required|exists:job_postings,id',
        'message' => 'required|string',
        'is_from_client' => 'boolean'
    ]);

    $conversation = Conversation::firstOrCreate([
        'company_id' => $request->client_id,
        'applicant_id' => $request->applicant_id,
        'job_posting_id' => $request->job_id
    ]);

    $message = new Message();
    $message->conversation_id = $conversation->id;
    
    $isFromClient = $request->has('is_from_client') ? $request->is_from_client : true;
    
    if ($isFromClient) {
        // Company is initiating
        $message->sender_id = $conversation->company_id;
        $message->sender_type = 'company';
        $message->receiver_id = $conversation->applicant_id;
    } else {
        // Applicant is initiating
        $message->sender_id = $conversation->applicant_id;
        $message->sender_type = 'applicant';
        $message->receiver_id = $conversation->company_id;
    }
    
    $message->message = $request->message;
    $message->is_read = false;
    $message->save();

    return response()->json([
        'status' => 'success',
        'message' => 'Conversation started successfully',
        'data' => [
            'conversation_id' => $conversation->id,
            'message_id' => $message->id
        ]
    ]);
}

    /**
     * Send a new message in an existing conversation
     */
   public function sendMessage(Request $request)
{
    $validator = Validator::make($request->all(), [
        'conversation_id' => 'required|exists:conversations,id',
        'sender_id' => 'required',
        'receiver_id' => 'required',
        'message' => 'required|string'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'failed',
            'message' => 'Validation failed',
            'errors' => $validator->errors()
        ], 422);
    }

    $conversation = Conversation::find($request->conversation_id);
    if (!$conversation) {
        return response()->json([
            'status' => 'failed',
            'message' => 'Conversation not found'
        ], 404);
    }

    $message = Message::create([
        'conversation_id' => $request->conversation_id,
        'sender_id' => $conversation->company_id,
        'sender_type' => 'company',
        'receiver_id' => $conversation->applicant_id,
        'message' => $request->message
    ]);

    return response()->json([
        'status' => 'success',
        'message' => 'Message sent successfully',
        'data' => [
            'message_id' => $message->id,
            'sent_at' => $message->created_at
        ]
    ]);
}

    /**
     * Get all conversations for a client/company
     */
    public function getConversations(Request $request)
{
    try {
        $tokenized = $request->header('X-Remember-Token');

        if (!$tokenized) {
            return response()->json([
                'status_tokenized' => 'error',
                'message_tokenized' => 'Invalid token or token not provided',
                'code' => 200,
            ], 200);
        }

        $company = CompanyDatabase::where('remember_token', $tokenized)->first();

        if (!$company) {
            return response()->json([
                'status_tokenized' => 'error',
                'message_tokenized' => 'Invalid token',
                'code' => 200,
            ], 200);
        }

        $companyId = $company->id;

    
        \Log::info('Fetching conversations for company ID: ' . $companyId);
        
 
        $conversations = Conversation::where('company_id', $companyId)
            ->with([
                'applicant:id,firstname,lastname,email,priority_job_id',
                'job:id,jobtitle'
            ])
            ->orderBy('updated_at', 'desc')
            ->get();
        
        \Log::info('Found ' . $conversations->count() . ' conversations');

        $conversationData = [];
        
        foreach ($conversations as $conversation) {
            if (!$conversation->applicant) {
                \Log::warning('Missing applicant for conversation ID: ' . $conversation->id);
                continue;
            }
 
            if (!$conversation->job) {
                \Log::warning('Missing job for conversation ID: ' . $conversation->id);
                continue;
            }

            $latestMessage = Message::where('conversation_id', $conversation->id)
                ->orderBy('created_at', 'desc')
                ->first();
            
            $conversationData[] = [
                'id' => $conversation->id,
                'applicant_id' => $conversation->applicant_id,
                'name' => $conversation->applicant->firstname . ' ' . $conversation->applicant->lastname,
                'initial' => $conversation->applicant->firstname[0] ?? '?',
                'email' => $conversation->applicant->email,
                'job_title' => $conversation->job->jobtitle,
                'job_id' => $conversation->job_posting_id,
                'last_message' => $latestMessage ? $latestMessage->message : null,
                'last_message_time' => $latestMessage ? $latestMessage->created_at->format('h:i A') : null,
                'updated_at' => $conversation->updated_at
            ];
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Conversations retrieved successfully',
            'data' => $conversationData
        ]);
    } catch (\Exception $e) {
        \Log::error('Error in getConversations: ' . $e->getMessage());
        \Log::error($e->getTraceAsString());

        return response()->json([
            'status' => 'error',
            'message' => 'Error retrieving conversations: ' . $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => $e->getTraceAsString()
        ], 500);
    }
}

    /**
     * Get messages for a specific conversation
     */
    public function getMessages(Request $request, $conversationId)
    {

        $tokenized = $request->header('X-Remember-Token');

        if (!$tokenized) {
            return response()->json([
                'status_tokenized' => 'error',
                'message_tokenized' => 'Invalid token or token not provided',
                'code' => 200,
            ], 200);
        }

        $company = CompanyDatabase::where('remember_token', $tokenized)->first();

        if (!$company) {
            return response()->json([
                'status_tokenized' => 'error',
                'message_tokenized' => 'Invalid token',
                'code' => 200,
            ], 200);
        }

        $companyId = $company->id;

        $conversation = Conversation::where('id', $conversationId)
            ->where('company_id', $companyId)
            ->first();
        
        if (!$conversation) {
            return response()->json([
                'status' => 'error',
                'message' => 'Conversation not found or you do not have access',
                'code' => 404
            ], 404);
        }

        $messages = Message::where('conversation_id', $conversationId)
            ->orderBy('created_at', 'asc')
            ->get();
        
        $messageData = [];
        
        foreach ($messages as $message) {
        $isFromCompany = $message->sender_type === 'company';
        
        $messageData[] = [
            'id' => $message->id,
            'sender' => $isFromCompany ? 'Company' : 'Applicant',
            'initial' => $isFromCompany ? 'C' : 'A',
            'content' => [$message->message],
            'received' => !$isFromCompany,
            'timestamp' => $message->created_at->toISOString(),
            'time' => $message->created_at->format('h:i A')
        ];
    }

        Message::where('conversation_id', $conversationId)
            ->where('receiver_id', $companyId)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return response()->json([
            'status' => 'success',
            'message' => 'Messages retrieved successfully',
            'data' => $messageData
        ]);
    }

    public function getApplicantConversations(Request $request)
{
    $applicantId = $request->header('X-Applicant-ID');
    
    \Log::info('Getting conversations for applicant: ' . $applicantId);
    
    if (!$applicantId) {
        return response()->json([
            'status' => 'error',
            'message' => 'Applicant ID not provided'
        ], 400);
    }
    
    $conversations = Conversation::where('applicant_id', $applicantId)
        ->with(['company', 'job:id,jobtitle'])
        ->orderBy('updated_at', 'desc')
        ->get();
    
    \Log::info('Found ' . $conversations->count() . ' conversations for applicant ' . $applicantId);
    
    $conversationData = [];
    
    foreach ($conversations as $conversation) {
        $latestMessage = Message::where('conversation_id', $conversation->id)
            ->orderBy('created_at', 'desc')
            ->first();
        
        $conversationData[] = [
            'id' => $conversation->id,
            'company_id' => $conversation->company_id,
            'company_name' => $conversation->company->company_name ?? $conversation->company->name ?? 'Company',
            'job_title' => $conversation->job->jobtitle ?? 'Position',
            'last_message' => $latestMessage ? $latestMessage->message : null,
            'last_message_time' => $latestMessage ? $latestMessage->created_at->timezone('Asia/Manila')->format('h:i A') : null,
            'unread_count' => Message::where('conversation_id', $conversation->id)
                ->where('receiver_id', $applicantId)
                ->where('is_read', false)
                ->count()
        ];
    }
    
    return response()->json([
        'status' => 'success',
        'data' => $conversationData
    ]);
}

/**
 * Get messages for a specific conversation (applicant view)
 */
public function getApplicantMessages(Request $request, $conversationId)
{
    $applicantId = $request->header('X-Applicant-ID');
    
    if (!$applicantId) {
        return response()->json([
            'status' => 'error',
            'message' => 'Applicant ID not provided'
        ], 400);
    }
    
    $conversation = Conversation::where('id', $conversationId)
        ->where('applicant_id', $applicantId)
        ->first();
    
    if (!$conversation) {
        return response()->json([
            'status' => 'error',
            'message' => 'Conversation not found'
        ], 404);
    }
    
    $messages = Message::where('conversation_id', $conversationId)
        ->orderBy('created_at', 'asc')
        ->get();
    
    $messageData = [];
    
    foreach ($messages as $message) {
        $isFromApplicant = $message->sender_type === 'applicant';
        
        $messageData[] = [
            'id' => $message->id,
            'sender' => $isFromApplicant ? 'You' : 'Company',
            'content' => [$message->message],
            'received' => !$isFromApplicant,
            'timestamp' => $message->created_at->toISOString(),
            'time' => $message->created_at->timezone('Asia/Manila')->format('h:i A')
        ];
    }
    
    Message::where('conversation_id', $conversationId)
        ->where('receiver_id', $applicantId)
        ->where('is_read', false)
        ->update(['is_read' => true]);
    
    return response()->json([
        'status' => 'success',
        'data' => $messageData
    ]);
}

/**
 * Send message from applicant
 */
public function sendApplicantMessage(Request $request)
{
    $validator = Validator::make($request->all(), [
        'conversation_id' => 'required|exists:conversations,id',
        'sender_id' => 'required',
        'receiver_id' => 'required',
        'message' => 'required|string'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'errors' => $validator->errors()
        ], 422);
    }

  
    $conversation = Conversation::find($request->conversation_id);
    if (!$conversation) {
        return response()->json([
            'status' => 'error',
            'message' => 'Conversation not found'
        ], 404);
    }

 
    $message = Message::create([
        'conversation_id' => $request->conversation_id,
        'sender_id' => $conversation->applicant_id,
        'sender_type' => 'applicant',
        'receiver_id' => $conversation->company_id,
        'message' => $request->message
    ]);

    Conversation::where('id', $request->conversation_id)
        ->update(['updated_at' => now()]);

    return response()->json([
        'status' => 'success',
        'data' => ['message_id' => $message->id]
    ]);
}

public function adminMessages() 
{
    return view('messages'); 
}

public function adminGetConversations(Request $request)
{
    try {
        \Log::info('adminGetConversations called');
        
        // Fetch all conversations with latest message for admin view
        $conversations = Conversation::with([
            'company:id,company_name',
            'applicant:id,firstname,lastname,email',
            'job:id,jobtitle'
        ])
        ->orderBy('updated_at', 'desc')
        ->get();
        
        \Log::info('Found ' . $conversations->count() . ' conversations');

        $conversationData = [];
        
        foreach ($conversations as $conversation) {
            if (!$conversation->applicant || !$conversation->company) {
                \Log::warning('Missing applicant or company for conversation ID: ' . $conversation->id);
                continue;
            }
            
            $latestMessage = Message::where('conversation_id', $conversation->id)
                ->orderBy('created_at', 'desc')
                ->first();
            
            $unreadCount = Message::where('conversation_id', $conversation->id)
                ->where('is_read', false)
                ->count();
            
            $companyName = $conversation->company->company_name ?? 'Unknown Company';
            
            $conversationData[] = [
                'id' => $conversation->id,
                'applicant_id' => $conversation->applicant_id,
                'applicant_name' => $conversation->applicant->firstname . ' ' . $conversation->applicant->lastname,
                'applicant_initial' => strtoupper(substr($conversation->applicant->firstname, 0, 1) . substr($conversation->applicant->lastname, 0, 1)),
                'applicant_email' => $conversation->applicant->email,
                'company_name' => $companyName,
                'company_initial' => strtoupper(substr($companyName, 0, 2)),
                'job_title' => $conversation->job->jobtitle ?? 'N/A',
                'last_message' => $latestMessage ? $latestMessage->message : null,
                'last_message_time' => $latestMessage ? $latestMessage->created_at->diffForHumans() : null,
                'unread_count' => $unreadCount,
                'is_active' => $conversation->is_active ?? true
            ];
        }

        \Log::info('Returning ' . count($conversationData) . ' conversations');
        
        return response()->json([
            'status' => 'success',
            'data' => $conversationData
        ]);
    } catch (\Exception $e) {
        \Log::error('Error in adminGetConversations: ' . $e->getMessage());
        \Log::error('File: ' . $e->getFile() . ' Line: ' . $e->getLine());
        \Log::error($e->getTraceAsString());
        
        return response()->json([
            'status' => 'error',
            'message' => 'Error retrieving conversations: ' . $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ], 500);
    }
}

public function adminGetMessages(Request $request, $conversationId)
{
    try {
        $conversation = Conversation::with([
            'company:id,company_name',
            'applicant:id,firstname,lastname',
            'job:id,jobtitle'
        ])->find($conversationId);
        
        if (!$conversation) {
            return response()->json([
                'status' => 'error',
                'message' => 'Conversation not found'
            ], 404);
        }

        if (!$conversation->applicant || !$conversation->company) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid conversation data'
            ], 400);
        }

        $messages = Message::where('conversation_id', $conversationId)
            ->orderBy('created_at', 'asc')
            ->get();
        
        $messageData = [];
        
        foreach ($messages as $message) {
            
            $isFromCompany = $message->sender_type === 'company';
            
            $senderName = $isFromCompany ? 
                ($conversation->company->company_name ?? 'Company') : 
                ($conversation->applicant->firstname . ' ' . $conversation->applicant->lastname);
            
            $senderInitial = $isFromCompany ? 
                strtoupper(substr($conversation->company->company_name ?? 'C', 0, 1)) : 
                strtoupper(substr($conversation->applicant->firstname, 0, 1));
            
            $messageData[] = [
                'id' => $message->id,
                'sender' => $senderName,
                'sender_type' => $isFromCompany ? 'company' : 'applicant',
                'initial' => $senderInitial,
                'content' => [$message->message],
                'received' => !$isFromCompany,
                'timestamp' => $message->created_at->toISOString(),
                'time' => $message->created_at->format('h:i A'),
                'is_read' => $message->is_read
            ];
        }

        return response()->json([
            'status' => 'success',
            'conversation' => [
                'company_name' => $conversation->company->company_name ?? 'Company',
                'applicant_name' => $conversation->applicant->firstname . ' ' . $conversation->applicant->lastname,
                'job_title' => $conversation->job->jobtitle ?? 'N/A'
            ],
            'data' => $messageData
        ]);
    } catch (\Exception $e) {
        \Log::error('Error in adminGetMessages: ' . $e->getMessage());
        \Log::error('File: ' . $e->getFile() . ' Line: ' . $e->getLine());
        \Log::error($e->getTraceAsString());
        
        return response()->json([
            'status' => 'error',
            'message' => 'Error retrieving messages: ' . $e->getMessage()
        ], 500);
    }
}
}