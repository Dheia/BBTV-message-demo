<?php

namespace RTippin\Messenger\Broadcasting\ClientEvents;

use RTippin\Messenger\Broadcasting\MessengerBroadcast;

class StopTyping extends MessengerBroadcast
{
    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs(): string
    {
        return 'client-stop-typing';
    }
}
