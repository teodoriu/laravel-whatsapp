<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Teodoriu\Whatsapp\Http\Controllers\WebhookController;
use Teodoriu\Whatsapp\Http\Middleware\VerifyWebhookSignature;

Route::get('webhook', [WebhookController::class, 'subscribe'])->name('webhook.subscribe');

$webhookRoute = Route::post('webhook', [WebhookController::class, 'handle'])->name('webhook');

if (Config::get('whatsapp.webhook.verify_signature')) {
    $webhookRoute->middleware(VerifyWebhookSignature::class);
}
