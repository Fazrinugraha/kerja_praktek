<?php
include 'db.php';

$message = '';
$messageType = '';

// Check if ID is set
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure $id is an integer to prevent SQL Injection

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Perform the deletion
        $sql = "DELETE FROM kerja_praktek WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $message = "Data berhasil dihapus.";
            $messageType = "success";
        } else {
            $message = "Error: " . $stmt->error;
            $messageType = "error";
        }

        $stmt->close();
        $conn->close();
    } else {
        // Display confirmation form
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Konfirmasi Penghapusan</title>
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
                    margin-top: 20px;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h2>Konfirmasi Penghapusan</h2>
                <p>Apakah Anda yakin ingin menghapus data ini? Data yang sudah dihapus tidak dapat dikembalikan.</p>
                <form action="" method="post">
                    <button type="submit" class="btn btn-primary">Hapus</button>
                    <a href="dashboard_koordinator.php" class="btn btn-secondary">Kembali ke Dashboard</a>
                </form>
            </div>
        </body>
        </html>
        <?php
    }

    // Display message if there is any
    if ($message) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Hasil Penghapusan</title>
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
                .alert-success {
                    background-color: #d4edda;
                    color: #155724;
                    border-color: #c3e6cb;
                }
                .alert-error {
                    background-color: #f8d7da;
                    color: #721c24;
                    border-color: #f5c6cb;
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
            </style>
        </head>
        <body>
            <div class="container">
                <?php if ($messageType === 'success') : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $message; ?>
                    </div>
                <?php else : ?>
                    <div class="alert alert-error" role="alert">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>
                <a href="dashboard_koordinator.php" class="btn btn-secondary">Kembali ke Dashboard</a>
            </div>
        </body>
        </html>
        <?php
    }
} else {
    echo "ID tidak disediakan!";
}
?>
