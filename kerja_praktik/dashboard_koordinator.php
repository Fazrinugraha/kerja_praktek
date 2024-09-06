<?php
session_start();
if ($_SESSION['role'] != 'Koordinator') {
    header("Location: login.php");
    exit();
}
include 'db.php';

$searchKeyword = '';
if (isset($_GET['search'])) {
    $searchKeyword = $_GET['search'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Koordinator</title>
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
            font-weight: bold;
            margin-bottom: 30px;
        }
        h3 {
            color: #6a11cb;
            text-align: left;
            margin-bottom: 10px;
            font-size: 23px;
        }
        .btn-primary {
            background-color: #6a11cb;
            border-color: #6a11cb;
            font-weight: bold;
        }
        .btn-primary:hover {
            background-color: #4a0a9e;
            border-color: #4a0a9e;
        }
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }
        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .btn-icon {
            background-color: #6a11cb;
            border-color: #6a11cb;
            border-radius: 60%;
            padding: 8px;
            font-size: 20px;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            text-align: center;
            margin: 0;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .btn-icon:hover {
            background-color: #4a0a9e;
            border-color: #4a0a9e;
        }
        .btn-icon .fa {
            margin: 0;
        }
        .input-group {
            margin-bottom: 30px;
        }
        .input-group .form-control {
            border-radius: 30px;
            padding-right: 40px;
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
        .d-flex-between {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .d-flex-between .input-group {
            margin: 0;
        }
        .d-flex-between .btn-icon {
            margin: 0 10px;
        }
        .table {
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
        .logout-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 10px;
            color: #6a11cb;
        }
        @media (max-width: 768px) {
            .container {
                padding: 15px;
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
        <div class="logout-icon">
            <a href="login.php" class="btn btn-icon" title="Logout" onclick="confirmLogout(event)">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
        <h2>Dashboard Koordinator</h2>
        <div class="d-flex d-flex-between mb-3">
            <!-- Form Pencarian -->
            <form method="GET" action="dashboard_koordinator.php" class="form-inline">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari..." value="<?php echo htmlspecialchars($searchKeyword); ?>">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-search" onclick="document.querySelector('form').submit();"></i></span>
                    </div>
                </div>
            </form>
            <!-- Tombol Tambah Data -->
            <a href="tambah_kerja_praktek.php" class="btn btn-icon" title="Tambah Data Kerja Praktek">
                <i class="fas fa-plus"></i>
            </a>
        </div>
        <h3>Data Kerja Praktek</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Angkatan</th>
                        <th>Tempat Magang</th>
                        <th>Kota</th>
                        <th>Pembimbing 1</th>
                        <th>Pembimbing 2</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Kueri SQL dengan pencarian
                    $sql = "SELECT * FROM kerja_praktek WHERE judul LIKE ? OR nim LIKE ? OR nama_mahasiswa LIKE ? OR angkatan LIKE ? OR tempat_magang LIKE ? OR kota LIKE ?";
                    $searchParam = "%{$searchKeyword}%";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('ssssss', $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    // Menampilkan data
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['judul']}</td>
                            <td>{$row['nim']}</td>
                            <td>{$row['nama_mahasiswa']}</td>
                            <td>{$row['angkatan']}</td>
                            <td>{$row['tempat_magang']}</td>
                            <td>{$row['kota']}</td>
                            <td>{$row['pembimbing1']}</td>
                            <td>{$row['pembimbing2']}</td>
                            <td>
                                <a href='edit_kerja_praktek.php?id={$row['id']}' class='btn btn-warning btn-sm'><i class='fas fa-edit'></i></a>
                                <a href='hapus_kerja_praktek.php?id={$row['id']}' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i></a>
                            </td>
                        </tr>";
                    }

                    $stmt->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
