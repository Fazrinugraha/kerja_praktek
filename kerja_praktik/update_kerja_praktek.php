<?php
include 'db.php';

// Mengambil data dari form
$id = $_POST['id'];
$judul = $_POST['judul'];
$nim = $_POST['nim'];
$nama_mahasiswa = $_POST['nama_mahasiswa'];
$angkatan = $_POST['angkatan'];
$tempat_magang = $_POST['tempat_magang'];
$kota = $_POST['kota'];
$pembimbing1 = $_POST['pembimbing1'];
$pembimbing2 = $_POST['pembimbing2'];

// Memeriksa apakah semua field yang diwajibkan telah diisi
if (!empty($judul) && !empty($nim) && !empty($nama_mahasiswa) && !empty($angkatan) && !empty($tempat_magang) && !empty($kota) && !empty($pembimbing1) && !empty($pembimbing2)) {
    
    // Query untuk mengupdate data
    $sql = "UPDATE kerja_praktek SET judul=?, nim=?, nama_mahasiswa=?, angkatan=?, tempat_magang=?, kota=?, pembimbing1=?, pembimbing2=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssi", $judul, $nim, $nama_mahasiswa, $angkatan, $tempat_magang, $kota, $pembimbing1, $pembimbing2, $id);

    if ($stmt->execute()) {
        $message = "Data berhasil diperbarui.";
        $messageType = "success";
        $redirectUrl = "dashboard_koordinator.php";
    } else {
        $message = "Error: " . $stmt->error;
        $messageType = "error";
        $redirectUrl = "edit_data.php?id=" . urlencode($id); // Ensure ID is URL-encoded
    }

    $stmt->close();
} else {
    $message = "Semua field yang diwajibkan harus diisi!";
    $messageType = "error";
    $redirectUrl = ""; // No redirection URL if fields are missing
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Status</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            margin: 0;
            color: #212529;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 40px auto;
            max-width: 600px;
        }
        .btn-primary {
            background-color: #6a11cb;
            border-color: #6a11cb;
            border-radius: 25px;
            padding: 10px 20px;
        }
        .btn-primary:hover {
            background-color: #4a0a9e;
            border-color: #4a0a9e;
        }
        .btn-secondary {
            background-color: #f8f9fa;
            color: #6a11cb;
            border-color: #6a11cb;
            border-radius: 25px;
            padding: 10px 20px;
            margin-top: 10px;
        }
        .btn-secondary:hover {
            background-color: #e9ecef;
            color: #4a0a9e;
            border-color: #4a0a9e;
        }
        .alert {
            margin-bottom: 20px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($messageType == 'success'): ?>
            <div class="alert alert-success">
                <strong>Berhasil!</strong> <?php echo $message; ?>
            </div>
            <a href="<?php echo $redirectUrl; ?>" class="btn btn-primary">Kembali ke Dashboard</a>
        <?php elseif ($messageType == 'error' && !empty($redirectUrl)): ?>
            <div class="alert alert-error">
                <strong>Error!</strong> <?php echo $message; ?>
            </div>
            <a href="<?php echo $redirectUrl; ?>" class="btn btn-secondary">Kembali ke Halaman Edit</a>
        <?php elseif ($messageType == 'error' && empty($redirectUrl)): ?>
            <div class="alert alert-error">
                <strong>Error!</strong> <?php echo $message; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
