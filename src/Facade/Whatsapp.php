<?php

namespace Teodoriu\Whatsapp\Facade;

use Teodoriu\Whatsapp\BusinessProfile;
use Teodoriu\Whatsapp\Messages\WhatsappMessage;
use Teodoriu\Whatsapp\Whatsapp as ConcreteWhatsapp;
use Illuminate\Support\Facades\Facade;
use Teodoriu\Whatsapp\WhatsappMedia;

/**
 * @method static array send(string|array $phones, WhatsappMessage $message)
 * @method static ConcreteWhatsapp client(string $numberId, string $token)
 * @method static ConcreteWhatsapp token(string $token)
 * @method static ConcreteWhatsapp numberId(string $numberId)
 * @method static ConcreteWhatsapp numberName(string $name)
 * @method static ConcreteWhatsapp defaultNumber()
 * @method static bool markRead(string $messageId)
 * @method static WhatsappMedia|string uploadMedia(string $file, string $type = null, bool $retrieveAllData = true)
 * @method static WhatsappMedia getMedia(string $mediaId, bool $download = false)
 * @method static bool deleteMedia(WhatsappMedia|string $id)
 * @method static WhatsappMedia downloadMedia(string|WhatsappMedia $media)
 * @method static BusinessProfile getProfile()
 * @method static bool updateProfile(array|BusinessProfile $data)
 */
class Whatsapp extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'whatsapp';
    }

    public static function from(?string $numberId, ?string $token): ConcreteWhatsapp
    {
        return new ConcreteWhatsapp($numberId, $token);
    }
}
