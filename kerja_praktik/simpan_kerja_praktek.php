<?php
session_start();
include 'db.php';

// Redirect to login if not a Koordinator
if ($_SESSION['role'] != 'Koordinator') {
    header("Location: login.php");
    exit();
}

$message = '';
$message_type = '';
$show_form = true; // Variable to control form visibility

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['judul'], $_POST['nim'], $_POST['nama_mahasiswa'], $_POST['angkatan'], 
              $_POST['tempat_magang'], $_POST['kota'], $_POST['pembimbing1'], $_POST['pembimbing2']) && 
        !empty($_POST['judul']) && !empty($_POST['nim']) && !empty($_POST['nama_mahasiswa']) && 
        !empty($_POST['angkatan']) && !empty($_POST['tempat_magang']) && !empty($_POST['kota']) && 
        !empty($_POST['pembimbing1']) && !empty($_POST['pembimbing2'])
    ) {
        $data = [
            'judul' => $_POST['judul'],
            'nim' => $_POST['nim'],
            'nama_mahasiswa' => $_POST['nama_mahasiswa'],
            'angkatan' => $_POST['angkatan'],
            'tempat_magang' => $_POST['tempat_magang'],
            'kota' => $_POST['kota'],
            'pembimbing1' => $_POST['pembimbing1'],
            'pembimbing2' => $_POST['pembimbing2']
        ];

        $sql = "INSERT INTO kerja_praktek (judul, nim, nama_mahasiswa, angkatan, tempat_magang, kota, pembimbing1, pembimbing2) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssss", ...array_values($data));

        if ($stmt->execute()) {
            $message = "Data berhasil disimpan.";
            $message_type = 'success';
            $show_form = false; // Hide form on success
        } else {
            $message = "Error: " . $stmt->error;
            $message_type = 'danger';
        }

        $stmt->close();
        $conn->close();
    } else {
        $message = "Semua field yang diwajibkan harus diisi!";
        $message_type = 'warning';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Kerja Praktek - Hasil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #212529;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 40px auto;
            max-width: 800px;
        }
        h2 {
            color: #6a11cb;
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #6a11cb;
            border-color: #6a11cb;
            border-radius: 25px;
        }
        .btn-primary:hover {
            background-color: #4a0a9e;
            border-color: #4a0a9e;
        }
        .alert {
            border-radius: 25px;
        }
        .alert-dismissible .close {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Data Kerja Praktek - Hasil</h2>
        <?php if ($message): ?>
            <div class="alert alert-<?php echo htmlspecialchars($message_type); ?> alert-dismissible fade show" role="alert">
                <?php echo htmlspecialchars($message); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <?php if ($show_form): ?>
            <form action="simpan_kerja_praktek.php" method="post">
                <?php foreach (['judul', 'nim', 'nama_mahasiswa', 'angkatan', 'tempat_magang', 'kota', 'pembimbing1', 'pembimbing2'] as $field): ?>
                    <div class="form-group">
                        <label for="<?php echo $field; ?>"><?php echo ucfirst(str_replace('_', ' ', $field)); ?>:</label>
                        <input type="text" class="form-control" id="<?php echo $field; ?>" name="<?php echo $field; ?>" required>
                    </div>
                <?php endforeach; ?>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        <?php endif; ?>

        <?php if (!$show_form && $message_type === 'success'): ?>
            <a href="dashboard_koordinator.php" class="btn btn-primary">Kembali ke Dashboard</a>
        <?php endif; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
