<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ChatModule extends Component
{

    public $messages = [];
    public $isUpdate = 0;
    public $newMessage;
    public $senderId;
    protected $queryString = ['senderId'];

    public function mount()
    {
        $this->updateMessageList();
    }

    public function updateMessageList()
    {
        $messageList = DB::table('messages')->get();
        $this->messages = [];
        foreach ($messageList as $message) {
            $this->messages[] = [
                'id' => $message->id,
                'is_sender' => $message->is_sender,
                'message' => $message->message,
            ];
        }
    }

    public function render()
    {
        return view('livewire.chat-module', ['messageData' => $this->messages]);
    }

    public function isNewMessage()
    {
        $data = DB::table('message_queue')->where('id', '!=', $this->senderId)->first();
        if ($data->is_new) {
            $this->updateMessageList();
            DB::table('message_queue')->where('id', '!=', $this->senderId)->update(['is_new' => 0]);
        } else {
            $this->fileName = null;
        }
    }

    public function sendMessage()
    {
        sleep(1);
        DB::table('messages')->insert(['message' => $this->newMessage, 'is_sender' => $this->senderId]);
        DB::table('message_queue')->where('id', $this->senderId)->update(['is_new' => 1]);
        $this->updateMessageList();
        $this->newMessage = '';
    }
}
