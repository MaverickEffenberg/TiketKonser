<?php

namespace App\Http\Controllers;

use App\Mail\TicketRegistrationReceived;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class TicketRegistrationController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $registration = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:32'],
            'ticket_quantity' => ['required', 'integer', 'between:1,4'],
            'ticket_category' => ['required', Rule::in(['festival', 'plus'])],
        ], [
            'full_name.required' => 'Nama lengkap wajib diisi.',
            'full_name.max' => 'Nama lengkap maksimal 255 karakter.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Alamat email harus valid.',
            'email.max' => 'Alamat email maksimal 255 karakter.',
            'phone.required' => 'Nomor WhatsApp wajib diisi.',
            'phone.max' => 'Nomor WhatsApp maksimal 32 karakter.',
            'ticket_quantity.required' => 'Jumlah tiket wajib dipilih.',
            'ticket_quantity.integer' => 'Jumlah tiket tidak valid.',
            'ticket_quantity.between' => 'Jumlah tiket harus antara 1 dan 4.',
            'ticket_category.required' => 'Kategori tiket wajib dipilih.',
            'ticket_category.in' => 'Kategori tiket tidak valid.',
        ]);

        Mail::to(config('mail.to.address'))->send(new TicketRegistrationReceived($registration));

        return back()->with('status', 'Pendaftaran berhasil dikirim. Terima kasih!');
    }
}
