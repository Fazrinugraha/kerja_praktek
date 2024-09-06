<?php
session_start();
include 'db.php';

$errorMessage = '';
$showError = false;

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepared statement to find user by username
    $stmt = $conn->prepare("SELECT * FROM pengguna WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['role'] = $user['role'];
            $redirectUrl = $user['role'] === 'Koordinator' ? 'dashboard_koordinator.php' : 'dashboard_mahasiswa.php';
            header("Location: $redirectUrl");
            exit();
        } else {
            $errorMessage = "Password salah!";
        }
    } else {
        $errorMessage = "Username tidak ditemukan!";
    }
    $showError = !empty($errorMessage);
} else {
    $errorMessage = "Data username dan password tidak ditemukan!";
    $showError = true;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Error</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .error-container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .error-container h2 {
            margin-bottom: 20px;
            color: #6a11cb;
        }
        .btn-primary {
            background-color: #6a11cb;
            border-color: #6a11cb;
        }
        .btn-primary:hover {
            background-color: #2575fc;
            border-color: #2575fc;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h2>Login Error</h2>
        <?php if ($showError): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($errorMessage); ?>
            </div>
        <?php endif; ?>
        <a href="login.php" class="btn btn-primary">Kembali ke Halaman Login</a>
    </div>
</body>
</html>
