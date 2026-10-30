<?php

namespace Tests\Feature;

use App\Mail\TicketRegistrationReceived;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Mail\PendingMail;
use Illuminate\Support\Facades\Mail;
use Mockery;
use Symfony\Component\Mailer\Exception\TransportException;
use Tests\TestCase;

class TicketRegistrationTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_valid_registration_is_saved_and_confirmation_is_sent_to_the_student_email(): void
    {
        Mail::fake();

        $response = $this->from(route('ticket-registrations.create'))
            ->post(route('ticket-registrations.store'), [
                'full_name' => 'Ayu Pratama',
                'student_email' => 'ayu@example.com',
                'phone' => '081234567890',
                'ticket_quantity' => '2',
                'ticket_category' => 'plus',
            ]);

        $response->assertRedirect(route('ticket-registrations.create'))
            ->assertSessionHas('status', 'Pendaftaran berhasil disimpan dan email konfirmasi telah dikirim.');

        $this->assertDatabaseHas('ticket_registrations', [
            'full_name' => 'Ayu Pratama',
            'student_email' => 'ayu@example.com',
            'phone' => '081234567890',
            'ticket_quantity' => 2,
            'ticket_category' => 'plus',
        ]);

        Mail::assertSent(TicketRegistrationReceived::class, function (TicketRegistrationReceived $mail): bool {
            $renderedMail = $mail->render();

            return $mail->hasTo('ayu@example.com')
                && $mail->registration->full_name === 'Ayu Pratama'
                && $mail->registration->student_email === 'ayu@example.com'
                && str_contains($renderedMail, 'Halo Ayu Pratama')
                && str_contains($renderedMail, 'ayu@example.com')
                && str_contains($renderedMail, '081234567890')
                && str_contains($renderedMail, 'Festival Plus')
                && str_contains($renderedMail, 'Pendaftaran tiketmu berhasil');
        });
    }

    public function test_invalid_student_email_is_rejected_without_saving_or_sending_email(): void
    {
        Mail::fake();

        $response = $this->from(route('ticket-registrations.create'))
            ->post(route('ticket-registrations.store'), [
                'full_name' => 'Ayu Pratama',
                'student_email' => 'not-an-email',
                'phone' => '081234567890',
                'ticket_quantity' => '2',
                'ticket_category' => 'plus',
            ]);

        $response->assertRedirect(route('ticket-registrations.create'))
            ->assertSessionHasErrors('student_email');

        $this->assertDatabaseCount('ticket_registrations', 0);
        Mail::assertNotSent(TicketRegistrationReceived::class);
    }

    public function test_registration_remains_saved_when_smtp_delivery_fails(): void
    {
        $pendingMail = Mockery::mock(PendingMail::class);
        $pendingMail->shouldReceive('send')
            ->once()
            ->with(Mockery::type(TicketRegistrationReceived::class))
            ->andThrow(new TransportException('SMTP unavailable'));

        Mail::shouldReceive('to')
            ->once()
            ->with('ayu@example.com')
            ->andReturn($pendingMail);

        $response = $this->from(route('ticket-registrations.create'))
            ->post(route('ticket-registrations.store'), [
                'full_name' => 'Ayu Pratama',
                'student_email' => 'ayu@example.com',
                'phone' => '081234567890',
                'ticket_quantity' => '2',
                'ticket_category' => 'plus',
            ]);

        $response->assertRedirect(route('ticket-registrations.create'))
            ->assertSessionHas('status', 'Pendaftaran berhasil disimpan, tetapi email konfirmasi belum dapat dikirim. Data pendaftaranmu tetap tercatat.');

        $this->assertDatabaseHas('ticket_registrations', [
            'student_email' => 'ayu@example.com',
        ]);
    }
}
