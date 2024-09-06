<?php
session_start();
if ($_SESSION['role'] != 'Mahasiswa') {
    header("Location: login.php");
    exit();
}
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc); 
            color: #212529;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
            position: relative;
        }
        h2 {
            color: #6a11cb;
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }
        h3 {
            color: #6a11cb; 
            margin-bottom: 0px;
            text-align: left; 
            font-size: 23px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            font-weight: bold;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .logout-button {
            position: absolute;
            top: 15px;
            right: 15px;
        }
        .logout-button a {
            color: #6a11cb;
            font-size: 20px;
            text-decoration: none;
        }
        .input-group {
            position: relative;
            margin-bottom: 30px;
        }
        .input-group .form-control {
            padding-right: 40px;
            border-radius: 30px;
        }
        .input-group .fa-search {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #6a11cb;
            font-size: 18px; 
            cursor: pointer;
        }
        table {
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
        }
        table thead th {
            background-color: #6a11cb;
            color: #ffffff;
        }
        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        table tbody tr:hover {
            background-color: #e9ecef;
        }
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
            .logout-button {
                position: static;
                margin-bottom: 15px;
            }
            .input-group .fa-search {
                font-size: 16px; 
            }
        }
    </style>
    <script>
        function confirmLogout(event) {
            if (!confirm("Apakah Anda yakin ingin keluar?")) {
                event.preventDefault(); 
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="logout-button">
            <a href="login.php" title="Logout" onclick="confirmLogout(event)"><i class="fas fa-sign-out-alt"></i></a>
        </div>
        <h2>Data Kerja Praktek</h2>
        <form action="dashboard_mahasiswa.php" method="get" id="search-form">
            <div class="form-group input-group">
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul kerja praktek">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-search" onclick="document.getElementById('search-form').submit();"></i></span>
                </div>
            </div>
        </form>

        <h3 class="mt-4">Hasil Pencarian</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Nama Mahasiswa</th>
                        <th>Pembimbing 1</th>
                        <th>Pembimbing 2</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['judul']) && !empty($_GET['judul'])) {
                        $judul_cari = $conn->real_escape_string($_GET['judul']);
                        $sql = "SELECT * FROM kerja_praktek WHERE judul LIKE '%$judul_cari%'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$row['judul']}</td>
                                        <td>{$row['nama_mahasiswa']}</td>
                                        <td>{$row['pembimbing1']}</td>
                                        <td>{$row['pembimbing2']}</td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Tidak ada data ditemukan</td></tr>";
                        }
                    } else {
                        // Jika tidak ada pencarian, tampilkan semua data
                        $sql = "SELECT * FROM kerja_praktek";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$row['judul']}</td>
                                        <td>{$row['nama_mahasiswa']}</td>
                                        <td>{$row['pembimbing1']}</td>
                                        <td>{$row['pembimbing2']}</td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Tidak ada data kerja praktek</td></tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
