<?php
include 'db.php';

// Ambil data berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM surat WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}

// Proses Update Data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $tanggal = $_POST['tanggal'];
    $no_surat = $_POST['no_surat'];
    $jenis_surat = $_POST['jenis_surat'];
    $perihal = $_POST['perihal'];

    $query = "UPDATE surat SET 
                tanggal = '$tanggal',
                no_surat = '$no_surat',
                jenis_surat = '$jenis_surat',
                perihal = '$perihal'
              WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil diperbarui'); window.location = 'pengelolaan_surat.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Surat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2 class="text-primary">Edit Surat</h2>
    <form action="edit_surat.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="<?php echo $row['tanggal']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="no_surat" class="form-label">No Surat</label>
            <input type="text" name="no_surat" class="form-control" value="<?php echo $row['no_surat']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="jenis_surat" class="form-label">Jenis Surat</label>
            <select name="jenis_surat" class="form-control" required>
                <option value="Surat Masuk" <?php if ($row['jenis_surat'] == 'Surat Masuk') echo 'selected'; ?>>Surat Masuk</option>
                <option value="Surat Keluar" <?php if ($row['jenis_surat'] == 'Surat Keluar') echo 'selected'; ?>>Surat Keluar</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="perihal" class="form-label">Perihal</label>
            <input type="text" name="perihal" class="form-control" value="<?php echo $row['perihal']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="pengelolaan_surat.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
