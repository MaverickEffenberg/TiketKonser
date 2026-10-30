<?php

namespace App\Http\Controllers;

use App\Mail\TicketRegistrationReceived;
use App\Models\TicketRegistration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class TicketRegistrationController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'student_email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:32'],
            'ticket_quantity' => ['required', 'integer', 'between:1,4'],
            'ticket_category' => ['required', Rule::in(['festival', 'plus'])],
        ], [
            'full_name.required' => 'Nama lengkap wajib diisi.',
            'full_name.max' => 'Nama lengkap maksimal 255 karakter.',
            'student_email.required' => 'Student Email wajib diisi.',
            'student_email.email' => 'Student Email harus berupa alamat email yang valid.',
            'student_email.max' => 'Student Email maksimal 255 karakter.',
            'phone.required' => 'Nomor WhatsApp wajib diisi.',
            'phone.max' => 'Nomor WhatsApp maksimal 32 karakter.',
            'ticket_quantity.required' => 'Jumlah tiket wajib dipilih.',
            'ticket_quantity.integer' => 'Jumlah tiket tidak valid.',
            'ticket_quantity.between' => 'Jumlah tiket harus antara 1 dan 4.',
            'ticket_category.required' => 'Kategori tiket wajib dipilih.',
            'ticket_category.in' => 'Kategori tiket tidak valid.',
        ]);

        $registration = TicketRegistration::create($validated);

        try {
            Mail::to($registration->student_email)->send(new TicketRegistrationReceived($registration));
        } catch (TransportExceptionInterface $exception) {
            report($exception);

            return back()->with('status', 'Pendaftaran berhasil disimpan, tetapi email konfirmasi belum dapat dikirim. Data pendaftaranmu tetap tercatat.');
        }

        return back()->with('status', 'Pendaftaran berhasil disimpan dan email konfirmasi telah dikirim.');
    }
}
