<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public  $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'test@test.com';
        $subject = 'New test Notification';
        $name = 'Site test';
        return $this->markdown('emails.notificationEmail')
            ->from($address, $name)
            ->subject($subject)
            ->with([
                'name'          =>  $this->data['name'],
                'userMessage'   =>  $this->data['userMessage'],
                'sender'        =>  $name
            ]);
    }
}
