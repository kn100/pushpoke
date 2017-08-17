<?php
/* PersonPoked is the event which will be broadcast when a user is poked.
/  All its public members ($poke,$pokee and $poker) will be broadcast to the
/  channel specified in the broadcastOn method. The broadcastAs method
/  specifies the type of event to broadcast (by default, it would be
   App\Events\PersonPoked) */
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
    public $pokee;
    public $poker;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($poke, $pokee, $poker)
    {
      //sorry
      $this->poke = $poke;
      $this->pokee = $pokee;
      $this->poker = $poker;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('user.'.$this->poke->poked_user_id);
    }

    public function broadcastAs(){
      return "poke";
    }
}
