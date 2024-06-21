<?php

namespace Teodoriu\Whatsapp\Messages\Components\Parameters;

use Teodoriu\Whatsapp\Messages\Components\Currency as ComponentsCurrency;

class Currency extends ComponentsCurrency
{
    public function toArray()
    {
        return [
            'type' => 'currency',
            'currency' => parent::toArray(),
        ];
    }
}
