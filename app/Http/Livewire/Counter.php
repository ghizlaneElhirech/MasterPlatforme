<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Message;

class Counter extends Component
{
    public $messageText;

    public function render()
    {
        $messages = Message::with('user')->latest()->take(10)->get()->sortBy('id');

        return view('livewire.counter', compact('messages'));
    }

    public function sendMessage()
    {
        Message::create([
            'user_id' => auth()->user()->id,
            'message_text' => $this->messageText,
        ]);

        $this->reset('messageText');
    }
}
 