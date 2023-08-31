<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MyEvent implements ShouldBroadcast {
    use Dispatchable, InteractsWithSockets, SerializesModels;

   
    public $text;

    public function __construct($text)
    {
        $this->text = $text;
        
    }

    public function broadcastOn()
    {
        return ['test-channel'];
    }
}
