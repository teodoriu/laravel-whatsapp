<?php

namespace Teodoriu\Whatsapp\Events\Metadata;

use Teodoriu\Whatsapp\Utils;

class MessageError
{
    public function __construct(
        public string $title,
        public string $code,
        public ?string $message,
        public ?array $data,
    ) {
        // 
    }

    /**
     * @return static[]
     */
    public static function fromPayload(array $payload): array
    {
        return collect($payload['errors'] ?? [])->map(fn ($error) => new static(
            Utils::extract($error, 'title'),
            Utils::extract($error, 'code'),
            $error['message'] ?? null,
            $error['error_data'] ?? null,
        ))->all();
    }
}
