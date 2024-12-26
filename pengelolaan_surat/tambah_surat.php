<?php
include 'db.php'; // Koneksi ke database

// Cek apakah form dikirimkan menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $tanggal     = mysqli_real_escape_string($conn, $_POST['tanggal']);
    $no_surat    = mysqli_real_escape_string($conn, $_POST['no_surat']);
    $jenis_surat = mysqli_real_escape_string($conn, $_POST['jenis_surat']);
    $perihal     = mysqli_real_escape_string($conn, $_POST['perihal']);

    // Cek apakah file lampiran diunggah
    if (isset($_FILES['lampiran']) && $_FILES['lampiran']['error'] === UPLOAD_ERR_OK) {
        $file_tmp   = $_FILES['lampiran']['tmp_name'];
        $file_name  = basename($_FILES['lampiran']['name']);
        $file_ext   = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Validasi file PDF
        if ($file_ext === 'pdf') {
            $upload_dir = 'uploads/';
            // Pastikan folder uploads ada, jika tidak buat
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }

            // Beri nama unik pada file
            $new_file_name = uniqid('lampiran_', true) . '.' . $file_ext;
            $target_file   = $upload_dir . $new_file_name;

            // Pindahkan file ke direktori uploads
            if (move_uploaded_file($file_tmp, $target_file)) {
                // Query untuk menyimpan data ke database
                $query = "INSERT INTO surat (tanggal, no_surat, jenis_surat, perihal, lampiran)
                          VALUES ('$tanggal', '$no_surat', '$jenis_surat', '$perihal', '$new_file_name')";

                if (mysqli_query($conn, $query)) {
                    // Redirect kembali ke halaman utama dengan pesan sukses
                    header("Location: pengelolaan_surat.php?status=success");
                    exit();
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "Error: Gagal mengunggah file lampiran.";
            }
        } else {
            echo "Error: Hanya file PDF yang diizinkan.";
        }
    } else {
        echo "Error: Lampiran tidak diunggah atau terjadi kesalahan.";
    }
} else {
    echo "Error: Akses tidak diizinkan.";
}
?>
