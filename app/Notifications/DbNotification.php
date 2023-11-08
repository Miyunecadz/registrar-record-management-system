<?php

namespace App\Notifications;

use App\Classes\Abstracts\BaseTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DbNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        private array $information
    )
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $information = (object) $this->information;

        return [
            'subject' => $information->subject,
            'body' => $information->body,
            'footer' => $information->footer
        ];

        // $templateDynamicText = $this->information->getDynamicText();

        // $expectedDynamicText = [
        //     'name' => $notifiable->getFullName(),
        //     'app_name' => config('app.name')
        // ];

        // $dynamicText = [];
        // foreach($templateDynamicText as $key => $value) {
        //     if(array_key_exists($key, $expectedDynamicText)) {
        //         $dynamicText[$value] = $expectedDynamicText[$key];
        //     }
        // }

        // $body = str_replace(array_keys($dynamicText), array_values($dynamicText),  $this->information->getBody());
        // $footer = str_replace(array_keys($dynamicText), array_values($dynamicText), $this->information->getFooter());
        // return [
        //     'subject' => $this->information->getSubject(),
        //     'body' => $body,
        //     'footer' => $footer
        // ];
    }
}
