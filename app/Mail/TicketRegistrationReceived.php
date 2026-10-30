<?php

namespace App\Mail;

use App\Models\TicketRegistration;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketRegistrationReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public TicketRegistration $registration) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Konfirmasi Pendaftaran Suara Kota Festival',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.ticket-registration',
        );
    }
}
