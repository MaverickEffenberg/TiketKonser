<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketRegistrationReceived extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @param  array{full_name: string, email: string, phone: string, ticket_quantity: int|string, ticket_category: string}  $registration
     */
    public function __construct(public array $registration) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pendaftaran Tiket Suara Kota',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.ticket-registration',
            with: ['registration' => $this->registration],
        );
    }
}
