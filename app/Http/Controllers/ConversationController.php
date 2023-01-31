<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index()
    {
        $conversations = Conversation::all();

        // return view('conversations.index', compact('conversations'));
        return $conversations;
    }

    public function show(Conversation $conversation)
    {
        return view('conversations.show', compact('conversation'));
    }

    public function create()
    {
        return view('conversations.create');
    }

    public function store(Request $request)
    {
        $conversation = new Conversation;
        $conversation->subject = $request->subject;
        $conversation->save();

        return redirect()->route('conversations.index');
    }

    public function edit(Conversation $conversation)
    {
        return view('conversations.edit', compact('conversation'));
    }

    public function update(Request $request, Conversation $conversation)
    {
        $conversation->subject = $request->subject;
        $conversation->save();

        return redirect()->route('conversations.show', $conversation->id);
    }

    public function destroy(Conversation $conversation)
    {
        $conversation->delete();

        return redirect()->route('conversations.index');
    }
}