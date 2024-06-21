<?php

namespace Teodoriu\Whatsapp\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Teodoriu\Whatsapp\Exceptions\MessageRequestException;

class MessageFailed
{
    use Dispatchable, SerializesModels;

    public function __construct(public MessageRequestException $exception)
    {
        // 
    }
}
