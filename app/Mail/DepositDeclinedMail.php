<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class DepositDeclinedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $transaction;

    /**
     * Create a new message instance.
     */
    public function __construct($transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('custom.account_email'), config('app.name')),
            subject: 'Deposit Declined Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.deposit-declined-mail',
            with: [
                'full_name' => $this->transaction->users->full_name,
                'amount' => $this->transaction->amount,
                'hash' => $this->transaction->hash,
                'status' => $this->transaction->status,
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
