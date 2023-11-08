<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Notifications\DbNotification;
use App\Classes\Templates\AccountApproved;

class DbNotificationTest extends TestCase
{
    /**
     * @test
     */
    public function canSendNotification()
    {
        $user = User::factory()->create();

        $information = [
            'subject' => 'Approved Request!',
            'body' => 'Your request has been approved',
            'footer' => 'Footer Sample'
        ];

        $user->notify(new DbNotification($information));

        $this->assertDatabaseHas('notifications', [
            'type' => 'App\Notifications\DbNotification',
            'notifiable_type' => 'App\Models\User',
            'notifiable_id' => $user->id,
            'data' => json_encode($information)
        ]);
    }

    /**
     * @test
     */
    public function canMarkAsReadNotification()
    {
        $user = User::factory()->create();

        $information = [
            'subject' => 'Approved Request!',
            'body' => 'Your request has been approved',
            'footer' => 'Footer Sample'
        ];

        $user->notify(new DbNotification($information));

        $notificationInfo = [
            'type' => 'App\Notifications\DbNotification',
            'notifiable_type' => 'App\Models\User',
            'notifiable_id' => $user->id,
            'data' => json_encode($information)
        ];

        $this->assertDatabaseHas('notifications', $notificationInfo);

        $notification = $user->notifications()->where($notificationInfo)->first();

        $user->unreadNotifications->where('id', $notification->id)->markAsRead();

        $notificationInfo['read_at'] = now();
        $this->assertDatabaseHas('notifications', $notificationInfo);
    }

    /** @test */
    public function canSendAccountApprovedNotification()
    {
        $user = User::factory()->create();

        $accountApprovedTemplate = (new AccountApproved())->toArray();

        $user->notify(new DbNotification($accountApprovedTemplate));

        $notificationInfo = [
            'type' => 'App\Notifications\DbNotification',
            'notifiable_type' => 'App\Models\User',
            'notifiable_id' => $user->id,
            'data' => json_encode($accountApprovedTemplate)
        ];

        $this->assertDatabaseHas('notifications', $notificationInfo);
    }
}
