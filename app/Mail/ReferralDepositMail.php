<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReferralDepositMail extends Mailable
{
    use Queueable, SerializesModels;

    public $amount;
    public $name;

    /**
     * Create a new message instance.
     */
    public function __construct($amount, $name)
    {
        $this->amount = $amount;
        $this->name = $name;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('custom.account_email'), config('app.name')),
            subject: 'Referral Deposit Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.referral-deposit-mail',
            with: [
                'name' => $this->name,
                'amount' => $this->amount,
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
