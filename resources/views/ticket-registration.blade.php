<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f4f5ef">
    <title>Formulif Pendaftaran Tiket | Suara Kota</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="site-header">
        <a class="wordmark" href="/" aria-label="Suara Kota, beranda">
            <span class="wordmark-icon" aria-hidden="true">SK</span>
            <span>suara<span class="wordmark-light">kota</span></span>
        </a>
        <span class="header-edition"><span class="live-dot"></span> EDISI 2026</span>
    </header>

    <main class="registration-shell">
        <section class="registration-form-panel" aria-labelledby="form-title">
            <div class="form-heading">
                <p class="eyebrow"><span class="eyebrow-line"></span> PENDAFTARAN TIKET</p>
                <h1 id="form-title">Formulir pendaftaran <span>tiket.</span></h1>
                <p class="form-intro">IsiSS detail di bawah untuk memilih tiketmu ke Suara Kota Festival.</p>
            </div>

            <form class="ticket-form" onsubmit="return false;">
                <fieldset class="form-section">
                    <legend><span class="section-number">01</span> Data pemesan</legend>
                    <div class="field-grid">
                        <label class="form-field" for="full-name">
                            <span>Nama lengkap</span>
                            <input id="full-name" name="full-name" type="text" placeholder="Nama sesuai identitas" autocomplete="name">
                        </label>
                        <label class="form-field" for="email">
                            <span>Alamat email</span>
                            <input id="email" name="email" type="email" placeholder="nama@email.com" autocomplete="email">
                        </label>
                        <label class="form-field" for="phone">
                            <span>Nomor WhatsApp</span>
                            <input id="phone" name="phone" type="tel" placeholder="08xx xxxx xxxx" autocomplete="tel">
                        </label>
                        <label class="form-field" for="ticket-quantity">
                            <span>Jumlah tiket</span>
                            <select id="ticket-quantity" name="ticket-quantity">
                                <option value="1">1 tiket</option>
                                <option value="2">2 tiket</option>
                                <option value="3">3 tiket</option>
                                <option value="4">4 tiket</option>
                            </select>
                        </label>
                    </div>
                </fieldset>

                <fieldset class="form-section ticket-section">
                    <legend><span class="section-number">02</span> Pilih kategori tiket</legend>
                    <div class="ticket-options">
                        <label class="ticket-option">
                            <input type="radio" name="ticket-category" value="festival" checked>
                            <span class="ticket-option-content">
                                <span class="ticket-option-top"><span class="ticket-name">Festival</span><span class="ticket-radio" aria-hidden="true"></span></span>
                                <span class="ticket-description">Akses area festival</span>
                                <span class="ticket-price">Rp 275.000 <small>/ orang</small></span>
                            </span>
                        </label>
                        <label class="ticket-option">
                            <input type="radio" name="ticket-category" value="plus">
                            <span class="ticket-option-content">
                                <span class="ticket-option-top"><span class="ticket-name">Festival Plus</span><span class="ticket-radio" aria-hidden="true"></span></span>
                                <span class="ticket-description">Akses prioritas + lounge</span>
                                <span class="ticket-price">Rp 490.000 <small>/ orang</small></span>
                            </span>
                        </label>
                    </div>
                </fieldset>

                <div class="form-footer">
                    <p class="secure-note"><span class="secure-mark" aria-hidden="true">✓</span> Data pemesan tetap aman</p>
                    <button class="continue-button" type="button">Lanjutkan <span aria-hidden="true">→</span></button>
                </div>
            </form>
        </section>

        <aside class="event-panel" aria-label="Informasi Suara Kota Festival">
            <div class="event-photo" role="img" aria-label="Penonton menikmati konser musik bersama-sama"></div>
            <div class="event-shade"></div>
            <div class="event-topline"><span class="event-tag">LIVE MUSIC · JAKARTA</span><span class="event-year">2026</span></div>
            <div class="event-copy">
                <p class="event-kicker">SATU PANGGUNG, BANYAK CERITA</p>
                <h2>Suara<br> Kota<span>.</span></h2>
                <div class="event-rule"></div>
                <div class="event-details">
                    <div><span>TANGGAL</span><strong>Sabtu, 24 Oktober 2026</strong></div>
                    <div><span>LOKASI</span><strong>Eco Park Ancol, Jakarta</strong></div>
                </div>
            </div>
            <div class="event-stamp" aria-hidden="true"><span>SUARA<br>KOTA</span><b>26</b></div>
            <p class="image-credit">MALAM YANG PANTAS DIKENANG</p>
        </aside>
    </main>

    <footer class="site-footer"><span>© 2026 SUARA KOTA FESTIVAL</span><span>JAKARTA, INDONESIA</span></footer>
</body>
</html>