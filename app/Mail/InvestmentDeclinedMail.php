<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvestmentDeclinedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $investment;

    /**
     * Create a new message instance.
     */
    public function __construct($investment)
    {
        $this->investment = $investment;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('accountsdepartent@fundrisecoin.com', 'FundRiseCoin'),
            subject: 'Investment Declined Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.investment-declined-mail',
            with: [
                'full_name' => $this->investment->users->full_name,
                'amount' => $this->investment->amount,
                'package' => $this->investment->packages->name,
                'duration' => $this->investment->packages->duration,
                'status' => $this->investment->status,
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
