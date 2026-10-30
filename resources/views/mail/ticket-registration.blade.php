<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Pendaftaran Tiket Suara Kota</title>
</head>
<body>
    <h1>Pendaftaran Tiket Suara Kota</h1>
    <p>Ada pendaftaran tiket baru dengan detail berikut:</p>

    <dl>
        <dt>Nama lengkap</dt>
        <dd>{{ $registration['full_name'] }}</dd>

        <dt>Alamat email</dt>
        <dd>{{ $registration['email'] }}</dd>

        <dt>Nomor WhatsApp</dt>
        <dd>{{ $registration['phone'] }}</dd>

        <dt>Jumlah tiket</dt>
        <dd>{{ $registration['ticket_quantity'] }}</dd>

        <dt>Kategori tiket</dt>
        <dd>{{ $registration['ticket_category'] === 'plus' ? 'Festival Plus' : 'Festival' }}</dd>
    </dl>
</body>
</html>
