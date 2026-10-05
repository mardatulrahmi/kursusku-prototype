# Log Penggunaan AI - Pertemuan 6
**Project:** KursusKu - Form Pendaftaran Lanjutan  
**Tanggal:** 04 Oktober 2026  
**AI yang digunakan:** Qwen / ChatGPT / Claude (sesuaikan dengan yang Anda pakai)

---

## Ringkasan Penggunaan AI

| No | Masalah / Tujuan | Saran AI | Keputusan | Hasil Uji |
|----|------------------|----------|-----------|-----------|
| 1 | **Diskon bercabang**<br>Perlu logika diskon berbeda per tipe peserta. | Gunakan fungsi `match()` di PHP untuk memetakan tipe peserta ke persentase diskon (Mahasiswa 10%, Guru 15%, Umum 5%). | Diterima | Perhitungan total akhir sesuai: Mahasiswa 10%, Guru 15%, Umum 5%. |
| 2 | **Kotak centang (checkbox) kosong**<br>Error/Warning saat user tidak memilih minat. | Validasi array menggunakan null coalescing: `$_POST['interests'] ?? []` dan pastikan tipe data array sebelum di-loop. | Diterima | Tidak ada warning PHP saat minat kosong, halaman tetap render normal dengan teks "(kosong)". |
| 3 | **Rendering data berulang (Looping)**<br>Markup HTML untuk fasilitas/minat terlalu panjang dan di-copy-paste. | Gunakan struktur `foreach` di PHP untuk merender daftar minat dan fasilitas secara dinamis dari array. | Diterima | Data baru muncul otomatis tanpa perlu copy-paste markup HTML. |
| 4 | **Warna form masih krem**<br>Setelah update CSS ke tema pink, tampilan di browser tidak berubah. | Lakukan *Hard Refresh* (`Ctrl + Shift + R` atau `Cmd + Shift + R`) karena browser menyimpan cache file CSS lama. | Diterima | Warna form berhasil berubah menjadi tema pink/magenta sesuai variabel CSS baru. |
| 5 | **Halaman ringkasan hanya data mentah**<br>`process-registration.php` awal hanya menampilkan teks `$_POST` biasa. | Buat ulang tampilan menggunakan layout `info-grid`, tabel rincian biaya, badge untuk minat, dan list fasilitas. | Diterima | Tampilan ringkasan menjadi rapi, informatif, dan sesuai dengan referensi gambar tugas. |
| 6 | **Tombol "History Dummy" tidak berfungsi**<br>Tombol `<button>` biasa tidak mengarah ke mana-mana. | Ubah elemen `<button>` menjadi `<a>` dengan class tombol, atau tambahkan atribut `onclick="window.location.href='...'"`. | Diterima | Tombol sekarang berhasil mengarahkan user ke halaman `history-dummy.php`. |
| 7 | **Halaman History Dummy belum ada**<br>Perlu halaman bukti penggunaan `foreach`. | Buat file `history-dummy.php` berisi array data latihan (Mardatul Rahmi, Cika, Nur, Gani) dan render menggunakan `foreach`. | Diterima | Halaman history tampil dengan tabel berisi 4 data dummy yang rapi. |
| 8 | **Format Test Matrix berbeda**<br>Format tabel awal terlalu panjang, tidak sesuai contoh dosen. | Sederhanakan format menjadi satu baris per skenario: `01 Skenario => Hasil : PASS`, sesuaikan harga dengan project sendiri. | Diterima | Format test matrix sesuai dengan contoh yang diberikan dosen. |

---

## Catatan Tambahan
- Semua pengujian dilakukan di lingkungan lokal (**XAMPP/Laragon**).
- Data yang digunakan adalah **data latihan/dummy**, bukan data pribadi nyata.
- AI digunakan sebagai **asisten debugging dan saran struktur kode**, bukan untuk menyalin keseluruhan project tanpa pemahaman.
- Seluruh implementasi divalidasi secara manual di browser (Chrome/Edge).