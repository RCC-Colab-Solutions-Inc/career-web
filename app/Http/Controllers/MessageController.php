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
        'message' => 'required|string'
    ]);

    // First find or create the conversation
    $conversation = Conversation::firstOrCreate([
        'company_id' => $request->client_id,
        'applicant_id' => $request->applicant_id,
        'job_posting_id' => $request->job_id
    ]);

    // Then create the message
    $message = new Message();
    $message->conversation_id = $conversation->id;
    $message->sender_id = $request->client_id; // Company is the sender
    $message->receiver_id = $request->applicant_id; // Applicant is the receiver
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

        // Create the message
        $message = Message::create([
            'conversation_id' => $request->conversation_id,
            'sender_id' => $request->sender_id,
            'receiver_id' => $request->receiver_id,
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
        // Get the company ID from the token
        $tokenized = $request->header('X-Remember-Token');

        if (!$tokenized) {
            return response()->json([
                'status_tokenized' => 'error',
                'message_tokenized' => 'Invalid token or token not provided',
                'code' => 200,
            ], 200);
        }

        // Look for the company with the provided token
        $company = CompanyDatabase::where('remember_token', $tokenized)->first();

        if (!$company) {
            return response()->json([
                'status_tokenized' => 'error',
                'message_tokenized' => 'Invalid token',
                'code' => 200,
            ], 200);
        }

        $companyId = $company->id;

        // Add debug logging
        \Log::info('Fetching conversations for company ID: ' . $companyId);
        
        // Get conversations with eager loading but limit the fields we retrieve
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
            // Skip if the applicant doesn't exist in the relation
            if (!$conversation->applicant) {
                \Log::warning('Missing applicant for conversation ID: ' . $conversation->id);
                continue;
            }
            
            // Skip if the job doesn't exist in the relation
            if (!$conversation->job) {
                \Log::warning('Missing job for conversation ID: ' . $conversation->id);
                continue;
            }
            
            // Get the latest message
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
        
        // Return full error details for debugging
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
        // Get the company ID from the token
        $tokenized = $request->header('X-Remember-Token');

        if (!$tokenized) {
            return response()->json([
                'status_tokenized' => 'error',
                'message_tokenized' => 'Invalid token or token not provided',
                'code' => 200,
            ], 200);
        }

        // Look for the company with the provided token
        $company = CompanyDatabase::where('remember_token', $tokenized)->first();

        if (!$company) {
            return response()->json([
                'status_tokenized' => 'error',
                'message_tokenized' => 'Invalid token',
                'code' => 200,
            ], 200);
        }

        $companyId = $company->id;

        // Verify this conversation belongs to the company
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

        // Get messages for this conversation
        $messages = Message::where('conversation_id', $conversationId)
            ->orderBy('created_at', 'asc')
            ->get();
        
        $messageData = [];
        
        foreach ($messages as $message) {
            $isFromCompany = $message->sender_id == $companyId;
            
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

        // Mark all unread messages as read
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
}