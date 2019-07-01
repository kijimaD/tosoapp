<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

// 管理ユーザに了承完了通知を送信する
class SendApproveDone extends Notification
{
    use Queueable;
    protected $user_name;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user_name)
    {
        $this->user_name= $user_name;
        // tips:引数をプロパティに格納してクラス内のどこでも使用できるようにする。
        // アクセスは $this->user_name で。
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // return (new MailMessage)
        //             ->line('The introduction to the notification.')
        //             ->action('Notification Action', url('/'))
        //             ->line('Thank you for using our application!');
        $url = ("https://とそ.com/approve/add");

        $mail = new MailMessage();
        // Todo: 文面は適当です
        $mail->subject('了承結果を確認していただき、ありがとうございます')
             ->line("{$this->user_name}様")
             ->greeting('とそブックスのご利用ありがとうございます。')
             ->line('了承内容にて入金を開始しました。完了まで少しお待ちください...');
        return $mail;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
