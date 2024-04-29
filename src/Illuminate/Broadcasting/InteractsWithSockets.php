<?php

namespace Illuminate\Broadcasting;

use Illuminate\Support\Facades\Broadcast;

trait InteractsWithSockets
{
    /**
     * The socket ID for the user that raised the event.
     *
     * @var string|null
     */
    public $socket;

    public array $specific = [];

    /**
     * Exclude the current user from receiving the broadcast.
     *
     * @return $this
     */
    public function dontBroadcastToCurrentUser()
    {
        $this->socket = Broadcast::socket();

        return $this;
    }

    public function broadcastToSpecific(array $ids)
    {
        $this->specific = $ids;
        return $this;
    }

    /**
     * Broadcast the event to everyone.
     *
     * @return $this
     */
    public function broadcastToEveryone()
    {
        $this->socket = null;

        return $this;
    }
}
