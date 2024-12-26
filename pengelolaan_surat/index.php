<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2 class="text-primary">Manajemen Surat</h2>
    <a href="tambah_surat.php" class="btn btn-primary mb-3">Tambah Surat</a>

    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>No Surat</th>
                <th>Jenis Surat</th>
                <th>Perihal</th>
                <th>Lampiran</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM surat ORDER BY id DESC");
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['tanggal']; ?></td>
                    <td><?php echo $row['no_surat']; ?></td>
                    <td><?php echo $row['jenis_surat']; ?></td>
                    <td><?php echo $row['perihal']; ?></td>
                    <td>
                        <a href="uploads/<?php echo $row['lampiran']; ?>" target="_blank" class="btn btn-success btn-sm">
                            Buka Lampiran
                        </a>
                    </td>

                        <!-- Button Edit -->
                       <td class="action-buttons text-center">
                            <a href="edit_surat.php?id=<?= urlencode($row['id']); ?>" class="btn btn-info btn-custom" style="text-decoration: none;">
                                <i class="fas fa-eye"></i>
                                    </a>
                                        </td>
                        <!-- Button Delete -->
                        <button onclick="handleDelete(<?php echo $row['id']; ?>)" 
                                class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </td>
                </tr>
<!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
</body>
</html>
