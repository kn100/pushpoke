<?php

namespace App\Events;
use App\Events\Event;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PersonPoked implements ShouldBroadcast
{

    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $poke;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($poke)
    {
      $this->poke = $poke;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('user.');
    }
}
