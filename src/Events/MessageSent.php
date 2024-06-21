<?php

namespace Teodoriu\Whatsapp\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Teodoriu\Whatsapp\MessageResponse;

class MessageSent
{
    use Dispatchable, SerializesModels;

    public function __construct(public MessageResponse $response)
    {
        // 
    }
}
