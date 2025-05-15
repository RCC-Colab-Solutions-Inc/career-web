<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Check if user is admin (adjust this based on your authentication setup)
        // For example, if you have an is_admin column in your users table:
        // if (!Auth::user()->is_admin) {
        //    abort(403, 'Unauthorized access');
        // }
        
        $search = $request->input('search');
        
        // Get all conversations
        $conversations = Conversation::with(['lastMessage', 'users' => function($query) {
                $query->select('users.id', 'name', 'email', 'job_title', 'is_online');
            }])
            ->when($search, function($query) use ($search) {
                return $query->whereHas('users', function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
            })
            ->get();
        
        // Pass the conversations data to both the view and as a JSON object for JavaScript
        return view('messages', [
            'conversations' => $conversations,
            'conversationsJson' => json_encode($conversations)
        ]);
    }

    /**
     * Get conversation JSON for Ajax requests
     */
    public function getConversation(Conversation $conversation)
    {
        $conversation->load(['messages.user', 'users']);
        return response()->json($conversation);
    }

    /**
     * Display the specified resource.
     */
    public function show(Conversation $conversation)
    {
        $conversation->load(['messages.user', 'users']);
        return view('messages.show', compact('conversation'));
    }
}