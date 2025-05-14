<?php

namespace App\Http\Controllers;

use App\Services\TelegramService;
use Illuminate\Http\Request;

class TelegramController extends Controller
{
    public function handle(Request $request)
    {
        $text = $request['message']['text'] ?? '';
        $chatId = $request['message']['chat']['id'];

        
        // handle the command or the text provided by telegram user
        $handler = match ($text) {
            '/hello' => function () use ($chatId) {
                    $message = 'Hello There! from karim test telegram app';
                    $this->sendMessage($message, $chatId);
                },

            '/start' => function () use ($chatId) {
                    $message = 'You have just started the application. Thanks for using Karim Test Telegram Bot';
                    $this->sendMessage($message, $chatId);
                },

            default => function () use ($chatId) {
                    $message = 'This command is not found in our list of registered commands. Please use one of our registered commands.';
                    $this->sendMessage($message, $chatId);
                }
        };

        $handler();

        return response()->json(['status' => 'Ok'], 200);
    }

    private function sendMessage(string $message, string $chatId): void
    {
        $config = [
            'chat_id' => $chatId,
            'text' => $message
        ];

        TelegramService::send($config);

    }
}
