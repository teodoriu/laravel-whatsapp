<?php

namespace Teodoriu\Whatsapp\Messages\Components;

use Teodoriu\Whatsapp\Messages\Enums\ContactInfoType;
use Teodoriu\Whatsapp\Messages\Message;

class ContactUrl implements Message
{
    public function __construct(
        public string $url,
        public ContactInfoType $type,
    ) {
        //
    }

    public static function create(
        string $url,
        ContactInfoType $type,
    ): static {
        return new static($url, $type);
    }

    public function toArray()
    {
        return [
            'url' => $this->url,
            'type' => $this->type->value,
        ];
    }

    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
