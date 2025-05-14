<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;


class TelegramService
{

    public static function send(array|null $config): void
    {
        Http::post("https://api.telegram.org/bot" . config("telegram.bot_token") . "/sendMessage", $config ?? []);
    }

}
