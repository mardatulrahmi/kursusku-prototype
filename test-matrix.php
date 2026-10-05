<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Test Matrix Pertemuan 6 - KursusKu</title>
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: Arial, sans-serif;
      background: #fce4ec;
      color: #333;
      line-height: 1.6;
      padding: 32px 20px;
    }

    .container {
      max-width: 1100px;
      margin: 0 auto;
    }

    .card {
      background: #fff;
      border: 2px solid #f8bbd0;
      border-radius: 12px;
      padding: 32px 36px;
      box-shadow: 0 2px 8px rgba(233, 30, 99, 0.08);
    }

    .eyebrow {
      font-size: 13px;
      font-weight: 700;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: #e91e63;
      margin-bottom: 8px;
    }

    .card h1 {
      font-size: 28px;
      font-weight: 800;
      color: #c2185b;
      margin-bottom: 24px;
    }

    /* ===== TABEL ===== */
    .test-table {
      width: 100%;
      border-collapse: collapse;
      border: 1px solid #f8bbd0;
      border-radius: 8px;
      overflow: hidden;
    }

    .test-table thead {
      background: #fce4ec;
    }

    .test-table th {
      padding: 12px 16px;
      text-align: left;
      font-size: 13px;
      font-weight: 700;
      color: #c2185b;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      border-bottom: 2px solid #f8bbd0;
    }

    .test-table th:first-child { width: 60px; text-align: center; }
    .test-table th:last-child { width: 110px; text-align: center; }

    .test-table td {
      padding: 12px 16px;
      font-size: 14px;
      color: #333;
      border-bottom: 1px solid #fce4ec;
    }

    .test-table td:first-child {
      text-align: center;
      font-weight: 600;
      color: #666;
    }

    .test-table td:last-child { text-align: center; }

    .test-table tbody tr:last-child td { border-bottom: none; }

    .test-table tbody tr:hover { background: #fff5f8; }

    /* ===== BADGE ===== */
    .badge-pass {
      display: inline-block;
      background: #fce4ec;
      color: #c2185b;
      font-size: 12px;
      font-weight: 700;
      padding: 4px 14px;
      border-radius: 12px;
      letter-spacing: 0.5px;
    }

    .badge-fail {
      display: inline-block;
      background: #ffebee;
      color: #c62828;
      font-size: 12px;
      font-weight: 700;
      padding: 4px 14px;
      border-radius: 12px;
      letter-spacing: 0.5px;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
      .card { padding: 20px 16px; }

      .test-table,
      .test-table thead,
      .test-table tbody,
      .test-table th,
      .test-table td,
      .test-table tr { display: block; }

      .test-table thead { display: none; }

      .test-table tbody tr {
        background: #fce4ec;
        border-radius: 8px;
        margin-bottom: 12px;
        padding: 12px;
      }

      .test-table td {
        padding: 6px 4px;
        border-bottom: none;
        display: flex;
        justify-content: space-between;
      }

      .test-table td::before {
        content: attr(data-label);
        font-weight: 700;
        color: #c2185b;
        font-size: 12px;
        margin-right: 8px;
      }

      .test-table td:first-child { text-align: left; }
      .test-table td:last-child { text-align: left; }
    }
  </style>
</head>
<body>

<div class="container">
  <div class="card">

    <p class="eyebrow">Evidence Week 06</p>
    <h1>Test Matrix Pertemuan 6</h1>

    <table class="test-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Skenario</th>
          <th>Actual</th>
          <th>Expected</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td data-label="No:">1</td>
          <td data-label="Skenario:">Mahasiswa, Web Dasar, 1 paket</td>
          <td data-label="Actual:">Rp 180.000</td>
          <td data-label="Expected:">Rp 180.000</td>
          <td data-label="Status:"><span class="badge-pass">PASS</span></td>
        </tr>
        <tr>
          <td data-label="No:">2</td>
          <td data-label="Skenario:">Guru, PHP Dasar, 1 paket</td>
          <td data-label="Actual:">Rp 212.500</td>
          <td data-label="Expected:">Rp 212.500</td>
          <td data-label="Status:"><span class="badge-pass">PASS</span></td>
        </tr>
        <tr>
          <td data-label="No:">3</td>
          <td data-label="Skenario:">Umum, Laravel Dasar, 1 paket</td>
          <td data-label="Actual:">Rp 285.000</td>
          <td data-label="Expected:">Rp 285.000</td>
          <td data-label="Status:"><span class="badge-pass">PASS</span></td>
        </tr>
        <tr>
          <td data-label="No:">4</td>
          <td data-label="Skenario:">Mahasiswa, Web Dasar, 2 paket</td>
          <td data-label="Actual:">Rp 360.000</td>
          <td data-label="Expected:">Rp 360.000</td>
          <td data-label="Status:"><span class="badge-pass">PASS</span></td>
        </tr>
        <tr>
          <td data-label="No:">5</td>
          <td data-label="Skenario:">Nama kosong</td>
          <td data-label="Actual:">Nama wajib diisi.</td>
          <td data-label="Expected:">Nama wajib diisi.</td>
          <td data-label="Status:"><span class="badge-pass">PASS</span></td>
        </tr>
        <tr>
          <td data-label="No:">6</td>
          <td data-label="Skenario:">Email tidak valid</td>
          <td data-label="Actual:">Email tidak valid.</td>
          <td data-label="Expected:">Email tidak valid.</td>
          <td data-label="Status:"><span class="badge-pass">PASS</span></td>
        </tr>
        <tr>
          <td data-label="No:">7</td>
          <td data-label="Skenario:">Minat kosong</td>
          <td data-label="Actual:">Belum memilih minat.</td>
          <td data-label="Expected:">Belum memilih minat.</td>
          <td data-label="Status:"><span class="badge-pass">PASS</span></td>
        </tr>
        <tr>
          <td data-label="No:">8</td>
          <td data-label="Skenario:">3 minat</td>
          <td data-label="Actual:">Frontend, Backend, Database</td>
          <td data-label="Expected:">Frontend, Backend, Database</td>
          <td data-label="Status:"><span class="badge-pass">PASS</span></td>
        </tr>
        <tr>
          <td data-label="No:">9</td>
          <td data-label="Skenario:">Metode offline</td>
          <td data-label="Actual:">Tatap Muka</td>
          <td data-label="Expected:">Tatap Muka</td>
          <td data-label="Status:"><span class="badge-pass">PASS</span></td>
        </tr>
        <tr>
          <td data-label="No:">10</td>
          <td data-label="Skenario:">Metode hybrid</td>
          <td data-label="Actual:">Hybrid</td>
          <td data-label="Expected:">Hybrid</td>
          <td data-label="Status:"><span class="badge-pass">PASS</span></td>
        </tr>
        <tr>
          <td data-label="No:">11</td>
          <td data-label="Skenario:">GET process-registration.php</td>
          <td data-label="Actual:">Tampil data kosong</td>
          <td data-label="Expected:">Tampil data kosong</td>
          <td data-label="Status:"><span class="badge-pass">PASS</span></td>
        </tr>
        <tr>
          <td data-label="No:">12</td>
          <td data-label="Skenario:">Tambah fasilitas</td>
          <td data-label="Actual:">Dirender otomatis dengan foreach</td>
          <td data-label="Expected:">Dirender otomatis dengan foreach</td>
          <td data-label="Status:"><span class="badge-pass">PASS</span></td>
        </tr>
      </tbody>
    </table>

  </div>
</div>

</body>
</html>