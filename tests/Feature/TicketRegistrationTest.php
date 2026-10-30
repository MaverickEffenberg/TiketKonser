<?php

namespace Tests\Feature;

use App\Mail\TicketRegistrationReceived;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class TicketRegistrationTest extends TestCase
{
    public function test_valid_registration_is_emailed_to_the_configured_recipient(): void
    {
        Mail::fake();

        $response = $this->from(route('ticket-registrations.create'))
            ->post(route('ticket-registrations.store'), [
                'full_name' => 'Ayu Pratama',
                'email' => 'ayu@example.com',
                'phone' => '081234567890',
                'ticket_quantity' => '2',
                'ticket_category' => 'plus',
            ]);

        $response->assertRedirect(route('ticket-registrations.create'))
            ->assertSessionHas('status', 'Pendaftaran berhasil dikirim. Terima kasih!');

        Mail::assertSent(TicketRegistrationReceived::class, function (TicketRegistrationReceived $mail): bool {
            $renderedMail = $mail->render();

            return $mail->hasTo('contact@mav.my.id')
                && $mail->registration['full_name'] === 'Ayu Pratama'
                && $mail->registration['email'] === 'ayu@example.com'
                && $mail->registration['ticket_quantity'] === '2'
                && $mail->registration['ticket_category'] === 'plus'
                && str_contains($renderedMail, 'Ayu Pratama')
                && str_contains($renderedMail, 'ayu@example.com')
                && str_contains($renderedMail, '081234567890')
                && str_contains($renderedMail, 'Festival Plus');
        });
    }

    public function test_invalid_registration_is_rejected_without_sending_email(): void
    {
        Mail::fake();

        $response = $this->from(route('ticket-registrations.create'))
            ->post(route('ticket-registrations.store'), []);

        $response->assertRedirect(route('ticket-registrations.create'))
            ->assertSessionHasErrors([
                'full_name',
                'email',
                'phone',
                'ticket_quantity',
                'ticket_category',
            ]);

        Mail::assertNotSent(TicketRegistrationReceived::class);
    }
}
