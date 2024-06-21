<?php

namespace Teodoriu\Whatsapp\Facade;

use Teodoriu\Whatsapp\Whatsapp as ConcreteWhatsapp;
use Illuminate\Support\Facades\Facade;

/**
 * @method static array send(string|array<string> $phones, \Teodoriu\Whatsapp\WhatsappMessage $message)
 * @method static \Teodoriu\Whatsapp\Whatsapp client(string $numberId, string $token)
 * @method static \Teodoriu\Whatsapp\Whatsapp token(string $token)
 * @method static \Teodoriu\Whatsapp\Whatsapp numberId(string $numberId)
 * @method static \Teodoriu\Whatsapp\Whatsapp numberName(string $name)
 * @method static \Teodoriu\Whatsapp\Whatsapp defaultNumber()
 * @method static bool markRead(string $messageId)
 * @method static \Teodoriu\Whatsapp\WhatsappMedia|string uploadMedia(string $file, string $type = null, bool $retrieveAllData = true)
 * @method static \Teodoriu\Whatsapp\WhatsappMedia getMedia(string $mediaId, bool $download = false)
 * @method static bool deleteMedia(\Teodoriu\Whatsapp\WhatsappMedia|string $id)
 * @method static \Teodoriu\Whatsapp\WhatsappMedia downloadMedia(string|\Teodoriu\Whatsapp\WhatsappMedia $media)
 * @method static \Teodoriu\Whatsapp\BusinessProfile getProfile()
 * @method static bool updateProfile(array|\Teodoriu\Whatsapp\BusinessProfile $data)
 */
class Whatsapp extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'whatsapp';
    }

    public static function from(?string $numberId, ?string $token): ConcreteWhatsapp
    {
        return new ConcreteWhatsapp($numberId, $token);
    }
}
