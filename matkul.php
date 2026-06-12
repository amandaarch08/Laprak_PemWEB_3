<?php
/*
  matkul.php — Percabangan IF / ELSEIF / ELSE
  Nama : Amanda Damayanti
  NIM  : 202432027
*/
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Informasi Mata Kuliah Laboratorium</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 30px; font-size: 14px; color: #111; }
    h2   { margin-bottom: 8px; }
    p    { margin: 4px 0; font-size: 13px; color: #555; }
    form { margin: 16px 0; }
    label { font-weight: bold; display: block; margin-bottom: 6px; }
    input[type="text"] {
      padding: 6px 10px; width: 240px;
      border: 1px solid #ccc; border-radius: 4px; font-size: 13px;
    }
    input[type="submit"] {
      margin-left: 8px; padding: 6px 18px;
      background: #0ea5e9; color: #fff;
      border: none; border-radius: 4px;
      font-size: 13px; cursor: pointer;
    }
    fieldset { margin-top: 20px; border: 1px solid #bbb; border-radius: 6px; padding: 14px 18px; max-width: 520px; }
    legend   { font-weight: bold; padding: 0 6px; }
    .info-row { margin: 4px 0; font-size: 13px; }
    .error    { color: #dc2626; font-style: italic; margin-top: 14px; }
  </style>
</head>
<body>

  <h2>Informasi Mata Kuliah Laboratorium</h2>
  <p>Nama : Amanda Damayanti</p>
  <p>NIM  : 202432027</p>

  <!-- FORM HTML dengan method POST -->
  <form method="POST" action="">
    <label for="matkul">Nama Mata Kuliah :</label>
    <input
      type="text"
      name="matkul"
      id="matkul"
      placeholder="Contoh: Data Warehouse"
      value="<?php echo isset($_POST['matkul']) ? htmlspecialchars($_POST['matkul']) : ''; ?>"
    />
    <input type="submit" value="Cari" />
  </form>

<?php
// Hanya proses jika form sudah di-submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Tangkap input, bersihkan spasi, ubah ke huruf kecil agar tidak case-sensitive
  $input     = trim($_POST['matkul']);
  $inputLower = strtolower($input);

  // ── PERCABANGAN IF / ELSEIF / ELSE ──

  if ($inputLower === 'data warehouse') {
    $lab      = 'Information Retrieval Laboratory';
    $nama     = 'Data Warehouse';
    $kode     = 'IRL-101';
    $sks      = 3;
    $deskripsi = 'Mempelajari konsep penyimpanan data berskala besar, proses ETL (Extract, Transform, Load), serta desain skema multidimensional untuk kebutuhan analitik bisnis.';

  } elseif ($inputLower === 'data mining') {
    $lab      = 'Information Retrieval Laboratory';
    $nama     = 'Data Mining';
    $kode     = 'IRL-102';
    $sks      = 3;
    $deskripsi = 'Membahas teknik penggalian pola dan pengetahuan dari kumpulan data besar, termasuk klasifikasi, klasterisasi, regresi, dan aturan asosiasi.';

  } elseif ($inputLower === 'pengantar big data') {
    $lab      = 'Information Retrieval Laboratory';
    $nama     = 'Pengantar Big Data';
    $kode     = 'IRL-103';
    $sks      = 2;
    $deskripsi = 'Pengenalan konsep, karakteristik (5V), ekosistem, dan teknologi yang digunakan dalam pengelolaan data berukuran sangat besar seperti Hadoop dan Spark.';

  } elseif ($inputLower === 'pemrograman mobile') {
    $lab      = 'Information Retrieval Laboratory';
    $nama     = 'Pemrograman Mobile';
    $kode     = 'IRL-104';
    $sks      = 3;
    $deskripsi = 'Mempelajari pengembangan aplikasi perangkat mobile berbasis Android maupun iOS menggunakan framework modern seperti Flutter atau React Native.';

  } elseif ($inputLower === 'pemrograman visual') {
    $lab      = 'Software Engineering Laboratory';
    $nama     = 'Pemrograman Visual';
    $kode     = 'SEL-201';
    $sks      = 3;
    $deskripsi = 'Mengembangkan kemampuan membangun antarmuka pengguna grafis (GUI) menggunakan bahasa pemrograman visual, berorientasi pada komponen dan event-driven programming.';

  } elseif ($inputLower === 'rekayasa perangkat lunak') {
    $lab      = 'Software Engineering Laboratory';
    $nama     = 'Rekayasa Perangkat Lunak';
    $kode     = 'SEL-202';
    $sks      = 3;
    $deskripsi = 'Membahas proses pengembangan perangkat lunak secara sistematis, mulai dari analisis kebutuhan, perancangan, implementasi, pengujian, hingga pemeliharaan sistem.';

  } elseif ($inputLower === 'pemrograman web') {
    $lab      = 'Software Engineering Laboratory';
    $nama     = 'Pemrograman Web';
    $kode     = 'SEL-203';
    $sks      = 3;
    $deskripsi = 'Mempelajari pengembangan aplikasi berbasis web. Mencakup HTML, CSS, PHP, dan koneksi ke database untuk membangun sistem informasi berbasis web yang fungsional.';

  } elseif ($inputLower === 'basis data') {
    $lab      = 'Software Engineering Laboratory';
    $nama     = 'Basis Data';
    $kode     = 'SEL-204';
    $sks      = 3;
    $deskripsi = 'Mempelajari konsep perancangan dan pengelolaan basis data relasional, mencakup ERD, normalisasi, bahasa query SQL, serta implementasi menggunakan DBMS seperti MySQL.';

  } else {
    // Mata kuliah tidak ditemukan
    echo '<p class="error">Mata kuliah "<em>' . htmlspecialchars($input) . '</em>" tidak ditemukan.</p>';
    $lab = null; // tandai bahwa tidak ada hasil
  }

  // Jika mata kuliah ditemukan, tampilkan dalam fieldset
  if (isset($lab) && $lab !== null) {
    echo '<fieldset>';
    echo '<legend>Hasil Pencarian</legend>';
    echo '<p class="info-row">Laboratorium &nbsp;: ' . htmlspecialchars($lab) . '</p>';
    echo '<p class="info-row">Nama Mata Kuliah &nbsp;: ' . htmlspecialchars($nama) . '</p>';
    echo '<p class="info-row">Kode &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ' . htmlspecialchars($kode) . '</p>';
    echo '<p class="info-row">SKS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ' . $sks . ' SKS</p>';
    echo '<p class="info-row">Deskripsi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ' . htmlspecialchars($deskripsi) . '</p>';
    echo '</fieldset>';
  }
}
?>

</body>
</html>
