<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Konfirmasi Pendaftaran Suara Kota Festival</title>
</head>
<body>
    <h1>Suara Kota Festival</h1>
    <h2>Konfirmasi Pendaftaran Tiket</h2>

    <p>Halo {{ $registration->full_name }},</p>

    <p>
        Pendaftaran tiketmu melalui Suara Kota Festival berhasil.
        Berikut detail pendaftaranmu:
    </p>

    <dl>
        <dt>Nama lengkap</dt>
        <dd>{{ $registration->full_name }}</dd>

        <dt>Student Email</dt>
        <dd>{{ $registration->student_email }}</dd>

        <dt>Nomor WhatsApp</dt>
        <dd>{{ $registration->phone }}</dd>

        <dt>Jumlah tiket</dt>
        <dd>{{ $registration->ticket_quantity }}</dd>

        <dt>Kategori tiket</dt>
        <dd>{{ $registration->ticket_category === 'plus' ? 'Festival Plus' : 'Festival' }}</dd>
    </dl>

    <p>Terima kasih telah mendaftar. Sampai jumpa di festival!</p>

    <p>
        Salam,<br>
        Tim Suara Kota Festival
    </p>

    <hr>

    <p>
        Email ini dikirim secara otomatis oleh website
        <strong>Suara Kota Festival</strong>.
    </p>

    <p>
        <a href="{{ config('app.url') }}">
            Kunjungi Website Suara Kota Festival
        </a>
    </p>
</body>
</html>