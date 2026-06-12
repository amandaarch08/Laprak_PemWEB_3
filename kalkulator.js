/* ============================================
   kalkulator.js — Logika Kalkulator Nilai Semester
   Nama: Amanda Damayanti | NIM: 202432027
   ============================================ */

// ── FUNGSI 1: Hitung Nilai Akhir berdasarkan bobot ──
function hitungNilaiAkhir(tugas, uts, uas) {
  return (tugas * 0.30) + (uts * 0.30) + (uas * 0.40);
}

// ── FUNGSI 2: Tentukan Grade dari nilai akhir ──
function tentukanGrade(nilai) {
  if (nilai >= 80) return 'A';
  if (nilai >= 70) return 'B';
  if (nilai >= 60) return 'C';
  if (nilai >= 50) return 'D';
  return 'E';
}

// ── FUNGSI 3: Validasi Input ──
function validasiInput(nilai, nama) {
  if (nilai === '' || nilai === null || nilai === undefined) {
    return `Nilai ${nama} tidak boleh kosong.`;
  }
  const angka = Number(nilai);
  if (isNaN(angka)) {
    return `Nilai ${nama} harus berupa angka.`;
  }
  if (angka < 0 || angka > 100) {
    return `Nilai ${nama} harus berada di rentang 0 – 100.`;
  }
  return null; // valid
}

// ── Keterangan grade untuk pengguna ──
function keteranganGrade(grade) {
  const ket = {
    'A': 'Sangat Baik – Pertahankan prestasi ini!',
    'B': 'Baik – Terus tingkatkan belajarmu.',
    'C': 'Cukup – Masih ada ruang untuk berkembang.',
    'D': 'Kurang – Perlu usaha lebih keras.',
    'E': 'Tidak Lulus – Semangat, coba lagi!'
  };
  return ket[grade] || '';
}

// ── EVENT: Window onload — pesan sambutan ──
window.onload = function () {
  const banner = document.getElementById('welcome-banner');
  if (banner) {
    banner.textContent = '✅ Halaman siap. Masukkan nilai kamu untuk memulai perhitungan.';
    banner.classList.add('show');
  }
};

// ── EVENT LISTENER tombol Hitung (menggunakan addEventListener) ──
document.addEventListener('DOMContentLoaded', function () {
  const btnHitung = document.getElementById('btn-hitung');

  btnHitung.addEventListener('click', function () {
    const inputTugas = document.getElementById('input-tugas').value.trim();
    const inputUTS   = document.getElementById('input-uts').value.trim();
    const inputUAS   = document.getElementById('input-uas').value.trim();

    // Debug log — nilai input mentah
    console.log('=== DEBUG INPUT MENTAH ===');
    console.log('Tugas :', inputTugas);
    console.log('UTS   :', inputUTS);
    console.log('UAS   :', inputUAS);

    const errorEl  = document.getElementById('error-message');
    const hasilEl  = document.getElementById('hasil-section');

    // Sembunyikan hasil sebelumnya
    errorEl.classList.remove('show');
    hasilEl.classList.remove('show');

    // Validasi semua input
    const errTugas = validasiInput(inputTugas, 'Tugas');
    const errUTS   = validasiInput(inputUTS,   'UTS');
    const errUAS   = validasiInput(inputUAS,   'UAS');

    const pesanError = errTugas || errUTS || errUAS;

    if (pesanError) {
      errorEl.textContent = '⚠ ' + pesanError;
      errorEl.classList.add('show');
      return;
    }

    // Hitung nilai akhir
    const tugas = Number(inputTugas);
    const uts   = Number(inputUTS);
    const uas   = Number(inputUAS);

    const nilaiAkhir = hitungNilaiAkhir(tugas, uts, uas);
    const grade      = tentukanGrade(nilaiAkhir);
    const ket        = keteranganGrade(grade);

    // Debug log — hasil akhir
    console.log('=== DEBUG HASIL AKHIR ===');
    console.log('Nilai Akhir :', nilaiAkhir.toFixed(2));
    console.log('Grade       :', grade);

    // Tampilkan hasil ke DOM
    document.getElementById('hasil-nilai').textContent = nilaiAkhir.toFixed(2);
    const gradeBadge = document.getElementById('hasil-grade');
    gradeBadge.textContent = grade;
    gradeBadge.className   = 'grade-badge grade-' + grade;
    document.getElementById('hasil-keterangan').textContent = ket;

    hasilEl.classList.add('show');
  });
});
