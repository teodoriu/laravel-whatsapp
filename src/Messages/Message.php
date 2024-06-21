<?php

namespace Teodoriu\Whatsapp\Messages;

use Illuminate\Contracts\Support\Arrayable;

interface Message extends Arrayable, \JsonSerializable
{
}
