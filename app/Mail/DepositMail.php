<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class DepositMail extends Mailable
{
    use Queueable, SerializesModels;

    public $request, $status;

    /**
     * Create a new message instance.
     */
    public function __construct($request, $status)
    {
        $this->request = $request;
        $this->status = $status;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('accountsdepartent@fundrisecoin.com', 'FundRiseCoin'),
            subject: 'Deposit Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.deposit-mail',
            with: [
                'full_name' => Auth::User()->full_name,
                'amount' => $this->request->amount,
                'hash' => $this->request->hash,
                'status' => $this->status,
            ],
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
