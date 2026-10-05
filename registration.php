<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Kursus - KursusKu</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- ===== HEADER ===== -->
<header class="site-header">
  <div class="container nav-wrap">
    <a class="brand" href="index.php">KursusKu</a>
    <nav aria-label="Navigasi utama">
      <a href="index.php">Beranda</a>
      <a href="index.php#katalog">Katalog</a>
      <a href="registration.php">Daftar</a>
    </nav>
  </div>
</header>

<!-- ===== KONTEN UTAMA ===== -->
<main class="container">

  <section class="page-intro">
    <p class="eyebrow">Milestone 6 · Form Lanjutan</p>
    <h1>Daftar Kursus</h1>
    <p>Alur: landing page → form → proses PHP → ringkasan. Belum memakai database.</p>
  </section>

  <section class="form-card">
    <form action="process-registration.php" method="POST" class="registration-form">
      <input type="hidden" name="source" value="week-06">

      <!-- Nama & Email -->
      <div class="form-row">
        <div class="form-group">
          <label for="name">Nama lengkap</label>
          <input id="name" name="name" type="text" minlength="3" maxlength="100" autocomplete="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input id="email" name="email" type="email" maxlength="120" autocomplete="email" required>
        </div>
      </div>

      <!-- Pilih Kursus -->
      <div class="form-group">
        <label for="course">Pilih kursus</label>
        <select id="course" name="course" required>
          <option value="">-- Pilih kursus --</option>
          <option value="web-dasar">Web Dasar</option>
          <option value="php-dasar">PHP Dasar</option>
          <option value="laravel-dasar">Laravel Dasar</option>
        </select>
      </div>

      <!-- Tipe Peserta -->
      <div class="form-group">
        <label>Tipe peserta</label>
        <div class="choice-card">
          <label class="choice">
            <input type="radio" name="participant_type" value="mahasiswa" required> Mahasiswa
          </label>
          <label class="choice">
            <input type="radio" name="participant_type" value="guru"> Guru
          </label>
          <label class="choice">
            <input type="radio" name="participant_type" value="umum"> Umum
          </label>
        </div>
      </div>

      <!-- Minat Belajar -->
      <div class="form-group">
        <label>Minat belajar</label>
        <div class="choice-card">
          <label class="choice">
            <input type="checkbox" name="interests[]" value="frontend"> Frontend
          </label>
          <label class="choice">
            <input type="checkbox" name="interests[]" value="backend"> Backend
          </label>
          <label class="choice">
            <input type="checkbox" name="interests[]" value="database"> Database
          </label>
          <label class="choice">
            <input type="checkbox" name="interests[]" value="ui-ux"> UI/UX
          </label>
        </div>
      </div>

      <!-- Metode Belajar & Jumlah Paket -->
      <div class="form-row">
        <div class="form-group">
          <label for="method">Metode belajar</label>
          <select id="method" name="method">
            <option value="">-- Pilih metode --</option>
            <option value="online">Online</option>
            <option value="offline">Offline</option>
            <option value="hybrid">Hybrid</option>
          </select>
        </div>
        <div class="form-group">
          <label for="package">Jumlah paket</label>
          <select id="package" name="package">
            <option value="1">1 paket</option>
            <option value="2">2 paket</option>
            <option value="3">3 paket</option>
          </select>
        </div>
      </div>

      <!-- Catatan Tambahan -->
      <div class="form-group">
        <label for="note">Catatan tambahan</label>
        <textarea id="note" name="note" rows="5" maxlength="300" placeholder="Tuliskan kebutuhan belajar Anda (opsional)"></textarea>
      </div>

      <!-- Tombol Aksi -->
      <div class="form-actions">
        <button class="btn-primary" type="submit">Proses Pendaftaran</button>
        <a href="history-dummy.php" class="btn-primary">History Dummy</a>
        <a href="loop-lab.php" class="btn-primary">Loop Lab</a>
      </div>

    </form>
  </section>

  <!-- Fasilitas -->
  <section class="fasilitas-card">
    <h2>Fasilitas</h2>
    <ul class="fasilitas-list">
      <li>Modul digital</li>
      <li>Sertifikat penyelesaian</li>
      <li>Forum diskusi kelas</li>
    </ul>
  </section>

</main>

<!-- ===== FOOTER ===== -->
<footer class="footer">
  <div class="container">
    <p>&copy; 2026 KursusKu. Semua hak dilindungi.</p>
  </div>
</footer>

</body>
</html>