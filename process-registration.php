<?php
function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

/* ===== AMBIL DATA DARI FORM ===== */
$name             = $_POST['name'] ?? '';
$email            = $_POST['email'] ?? '';
$course           = $_POST['course'] ?? '';
$participantType  = $_POST['participant_type'] ?? '';
$method           = $_POST['method'] ?? '';
$package          = !empty($_POST['package']) ? (int)$_POST['package'] : 1;
$interests        = $_POST['interests'] ?? [];
$note             = $_POST['note'] ?? '';
$source           = $_POST['source'] ?? '';

/* ===== LABEL KURSUS ===== */
$courseLabels = [
    'web-dasar'           => 'Web Dasar',
    'php-dasar'           => 'PHP Dasar',
    'laravel-dasar'       => 'Laravel Dasar',
];
$courseName = $courseLabels[$course] ?? ($course !== '' ? $course : '-');

/* ===== LABEL TIPE PESERTA ===== */
$typeLabels = [
    'mahasiswa' => 'Mahasiswa',
    'guru'      => 'Guru',
    'umum'      => 'Umum',
];
$typeName = $typeLabels[$participantType] ?? ($participantType !== '' ? $participantType : '-');

/* ===== LABEL METODE ===== */
$methodLabels = [
    'online'  => 'Online',
    'offline' => 'Tatap Muka',
    'hybrid'  => 'Hybrid',
];
$methodName = $methodLabels[$method] ?? ($method !== '' ? $method : '-');

/* ===== HARGA KURSUS ===== */
$coursePrices = [
    'Web Dasar'           => 200000,
    'PHP Dasar'           => 250000,
    'Laravel Dasar'       => 300000,
];
$coursePrice = $coursePrices[$courseName] ?? 300000;

/* ===== DISKON BERDASARKAN JENIS PESERTA ===== */
$discountPercent = match ($participantType) {
    'mahasiswa' => 10,
    'guru'      => 15,
    'umum'      => 5,
    default     => 0
};

$subtotal = $coursePrice * max($package, 1);
$discount = $subtotal * $discountPercent / 100;
$total    = $subtotal - $discount;

/* ===== PASTIKAN INTERESTS ARRAY ===== */
if (!is_array($interests)) {
    $interests = [$interests];
}

/* ===== LABEL MINAT ===== */
$interestLabels = [
    'frontend' => 'Frontend',
    'backend'  => 'Backend',
    'database' => 'Database',
    'ui-ux'    => 'UI/UX',
];

function rupiah(int $angka): string {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ringkasan Pendaftaran - KursusKu</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: Arial, sans-serif;
            background: #fafafa;
            color: #333;
            line-height: 1.6;
            padding: 32px 20px;
        }
        .container { max-width: 760px; margin: 0 auto; }

        /* ===== ALERT HEADER ===== */
        .alert-success {
            background: #fce4ec;
            border-left: 4px solid #e91e63;
            padding: 1.5rem;
            border-radius: 4px;
            margin-bottom: 1.5rem;
        }
        .alert-success h1 {
            color: #c2185b;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        .alert-success p { color: #333; }

        /* ===== SUMMARY CARD ===== */
        .summary-card {
            background: #fff;
            border: 1px solid #f8bbd0;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 2px 8px rgba(233,30,99,0.08);
        }

        /* ===== INFO GRID ===== */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
            margin-bottom: 28px;
        }
        .info-box {
            background: #fce4ec;
            border-radius: 10px;
            padding: 14px 18px;
        }
        .info-box .label {
            font-size: 13px;
            font-weight: 700;
            color: #c2185b;
            margin-bottom: 2px;
        }
        .info-box .value {
            font-size: 15px;
            color: #333;
        }
        .info-box .value.empty {
            color: #999;
            font-style: italic;
        }

        /* ===== SECTION TITLE ===== */
        .section-title {
            font-size: 18px;
            font-weight: 700;
            color: #c2185b;
            margin-bottom: 14px;
            margin-top: 28px;
        }

        /* ===== TABEL BIAYA ===== */
        .cost-table {
            width: 100%;
            border: 1.5px solid #f8bbd0;
            border-radius: 10px;
            overflow: hidden;
            border-collapse: collapse;
        }
        .cost-table tr { border-bottom: 1px solid #fce4ec; }
        .cost-table tr:last-child { border-bottom: none; }
        .cost-table td {
            padding: 14px 18px;
            font-size: 15px;
        }
        .cost-table td:first-child { color: #333; }
        .cost-table td:last-child {
            text-align: right;
            font-weight: 600;
            color: #333;
        }
        .cost-table tr.total-row { background: #fce4ec; }
        .cost-table tr.total-row td {
            font-weight: 700;
            color: #c2185b;
        }

        /* ===== BADGE MINAT ===== */
        .badge-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .badge {
            background: #fce4ec;
            color: #c2185b;
            font-size: 14px;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 20px;
        }

        /* ===== FASILITAS LIST ===== */
        .fasilitas-list {
            list-style: none;
            padding-left: 4px;
        }
        .fasilitas-list li {
            font-size: 15px;
            color: #333;
            padding: 3px 0;
        }
        .fasilitas-list li::before {
            content: "• ";
            color: #e91e63;
            font-weight: 700;
        }

        /* ===== CATATAN ===== */
        .note-text {
            font-size: 15px;
            color: #333;
            background: #fce4ec;
            padding: 14px 18px;
            border-radius: 10px;
        }
        .note-text.empty {
            color: #999;
            font-style: italic;
        }

        /* ===== TOMBOL ===== */
        .action-buttons {
            display: flex;
            gap: 12px;
            margin-top: 32px;
            flex-wrap: wrap;
        }
        .btn {
            padding: 12px 22px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            font-family: inherit;
            transition: all 0.2s;
            border: 2px solid transparent;
            display: inline-block;
        }
        .btn-solid {
            background-color: #e91e63;
            color: #fff;
            border-color: #e91e63;
        }
        .btn-solid:hover {
            background-color: #c2185b;
            border-color: #c2185b;
        }
        .btn-outline {
            background-color: #fff;
            color: #e91e63;
            border-color: #e91e63;
        }
        .btn-outline:hover {
            background-color: #fce4ec;
        }

        @media (max-width: 600px) {
            .summary-card { padding: 1.2rem; }
            .info-grid { grid-template-columns: 1fr; }
            .action-buttons { flex-direction: column; }
            .btn { width: 100%; text-align: center; }
        }
    </style>
</head>
<body>

<div class="container">

    <!-- Alert Header -->
    <div class="alert-success">
        <h1>Pendaftaran Berhasil Diproses</h1>
        <p>Periksa kembali data latihan berikut.</p>
    </div>

    <div class="summary-card">

        <!-- Info Pendaftaran -->
        <div class="info-grid">
            <div class="info-box">
                <div class="label">Nama:</div>
                <div class="value <?= empty($name) ? 'empty' : '' ?>">
                    <?= !empty($name) ? e($name) : '(kosong)' ?>
                </div>
            </div>
            <div class="info-box">
                <div class="label">Email:</div>
                <div class="value <?= empty($email) ? 'empty' : '' ?>">
                    <?= !empty($email) ? e($email) : '(kosong)' ?>
                </div>
            </div>
            <div class="info-box">
                <div class="label">Kursus:</div>
                <div class="value <?= empty($course) ? 'empty' : '' ?>">
                    <?= !empty($course) ? e($courseName) : '(kosong)' ?>
                </div>
            </div>
            <div class="info-box">
                <div class="label">Tipe peserta:</div>
                <div class="value <?= empty($participantType) ? 'empty' : '' ?>">
                    <?= !empty($participantType) ? e($typeName) : '(kosong)' ?>
                </div>
            </div>
            <div class="info-box">
                <div class="label">Metode:</div>
                <div class="value <?= empty($method) ? 'empty' : '' ?>">
                    <?= !empty($method) ? e($methodName) : '(kosong)' ?>
                </div>
            </div>
            <div class="info-box">
                <div class="label">Jumlah paket:</div>
                <div class="value <?= $package == 0 ? 'empty' : '' ?>">
                    <?= $package > 0 ? $package : '(kosong)' ?>
                </div>
            </div>
        </div>

        <!-- Rincian Biaya -->
        <h2 class="section-title">Rincian Biaya</h2>
        <table class="cost-table">
            <tr>
                <td>Biaya satuan</td>
                <td><?= rupiah($coursePrice) ?></td>
            </tr>
            <tr>
                <td>Subtotal</td>
                <td><?= rupiah($subtotal) ?></td>
            </tr>
            <tr>
                <td>Diskon <?= $discountPercent ?>%</td>
                <td>-<?= rupiah($discount) ?></td>
            </tr>
            <tr class="total-row">
                <td>TOTAL AKHIR</td>
                <td><?= rupiah($total) ?></td>
            </tr>
        </table>

        <!-- Minat -->
        <h2 class="section-title">Minat</h2>
        <div class="badge-list">
            <?php if (!empty($interests)): ?>
                <?php foreach ($interests as $interest): ?>
                    <span class="badge"><?= e($interestLabels[$interest] ?? $interest) ?></span>
                <?php endforeach; ?>
            <?php else: ?>
                <span style="color:#999; font-size:14px; font-style:italic;">(kosong)</span>
            <?php endif; ?>
        </div>

        <!-- Fasilitas -->
        <h2 class="section-title">Fasilitas</h2>
        <ul class="fasilitas-list">
            <li>Modul digital</li>
            <li>Sertifikat penyelesaian</li>
            <li>Forum diskusi kelas</li>
        </ul>

        <!-- Catatan -->
        <h2 class="section-title">Catatan</h2>
        <?php if (!empty($note)): ?>
            <div class="note-text"><?= e($note) ?></div>
        <?php else: ?>
            <div class="note-text empty">(kosong)</div>
        <?php endif; ?>

        <!-- Tombol Aksi -->
        <div class="action-buttons">
            <a href="registration.php" class="btn btn-solid">Daftar Lagi</a>
            <a href="history-dummy.php" class="btn btn-outline">Lihat History Dummy</a>
            <a href="index.php" class="btn btn-outline">Beranda</a>
        </div>

    </div>
</div>

</body>
</html>