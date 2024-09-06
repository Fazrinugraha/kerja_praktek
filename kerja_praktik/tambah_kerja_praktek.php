<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Kerja Praktek</title>
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
            max-width: 800px;
        }
        h2 {
            color: #6a11cb;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group label {
            color: #6a11cb;
        }
        .form-control {
            border-radius: 25px;
            padding: 15px;
            border-color: #6a11cb;
        }
        .form-control:focus {
            border-color: #4a0a9e;
            box-shadow: 0 0 0 0.2rem rgba(99, 105, 255, 0.25);
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
        <h2>Tambah Data Kerja Praktek</h2>
        <form action="simpan_kerja_praktek.php" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="judul">Judul Kerja Praktek:</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
            <div class="form-group">
                <label for="nama_mahasiswa">Nama Mahasiswa:</label>
                <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" required>
            </div>
            <div class="form-group">
                <label for="angkatan">Angkatan:</label>
                <input type="number" class="form-control" id="angkatan" name="angkatan" required>
            </div>
            <div class="form-group">
                <label for="tempat_magang">Tempat Magang:</label>
                <input type="text" class="form-control" id="tempat_magang" name="tempat_magang" required>
            </div>
            <div class="form-group">
                <label for="kota">Kota:</label>
                <input type="text" class="form-control" id="kota" name="kota" required>
            </div>
            <div class="form-group">
                <label for="pembimbing1">Pembimbing 1:</label>
                <input type="text" class="form-control" id="pembimbing1" name="pembimbing1">
            </div>
            <div class="form-group">
                <label for="pembimbing2">Pembimbing 2:</label>
                <input type="text" class="form-control" id="pembimbing2" name="pembimbing2">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="dashboard_koordinator.php" class="btn btn-secondary">Kembali ke Dashboard</a>
        </form>
    </div>
    <script>
        function validateForm() {
            var fields = ["judul", "nim", "nama_mahasiswa", "angkatan", "tempat_magang", "kota"];
            for (var i = 0; i < fields.length; i++) {
                if (document.getElementById(fields[i]).value.trim() === "") {
                    alert("Semua field harus diisi!");
                    return false;
                }
            }
            return true;
        }
    </script>
</body>
</html>
