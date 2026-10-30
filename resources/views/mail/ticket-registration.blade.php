<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Pendaftaran Tiket Suara Kota</title>
</head>
<body>
    <h1>Konfirmasi Pendaftaran Suara Kota Festival</h1>
    <p>Halo {{ $registration->full_name }},</p>
    <p>Pendaftaran tiketmu berhasil. Berikut detail pendaftaranmu:</p>

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
</body>
</html>
