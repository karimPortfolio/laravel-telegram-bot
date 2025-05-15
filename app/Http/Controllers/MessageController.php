<?php

namespace App\Http\Controllers;

use App\Services\TelegramService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MessageController extends Controller
{


    public function create(): View
    {
        return view("pages.messages.send-message");
    }

    public function sendMessage(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'link_title' => 'nullable|string|max:255',
            'link_url' => 'nullable|url|max:255',
        ]);

        /**
         * @var array $config
         */
        $config = $this->getConfig($request);


        TelegramService::send($config);

        return redirect(route("messages.create"))->with('message', 'Your message has been sent to telegram bot with success.');

    }


    /**
     * Get telegram configuration to be sent as a body to telegram bot API's
     * 
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    private function getConfig(Request $request): array
    {
        $title = \Str::upper($request->input('title'));
        $message = $request->input('message');
        $linkTitle = $request->input('link_title');
        $linkUrl = $request->input('link_url');

        if ($linkTitle && $linkUrl) {
            return [
                'chat_id' => config('telegram.chat_id'),
                'text' => "{$title} \n\n {$message}",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                        [
                            [
                                'text' => $linkTitle,
                                'url' => $linkUrl
                            ]
                        ]
                    ]
                ])
            ];
        }

        return [
            'chat_id' => config('telegram.chat_id'),
            'text' => "{$title} \n\n {$message}",
        ];
    }

}
