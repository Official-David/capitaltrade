<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReferralRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $oldUser;
    public $user;

    /**
     * Create a new message instance.
     */
    public function __construct($oldUser, $user)
    {
        $this->oldUser = $oldUser;
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('custom.account_email'), config('app.name')),
            subject: 'Referral Registration Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.referral-registration-mail',
            with: [
                'full_name' => $this->oldUser->full_name,
                'name' => $this->user->full_name,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
