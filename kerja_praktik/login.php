<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- CDN Font Awesome -->
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #ffffff;
            margin: 0;
        }
        .login-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .login-container h2 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #6a11cb;
            text-align: center;
        }
        .login-container .form-group label {
            font-weight: bold;
            color: #555;
        }
        .login-container .btn-primary {
            background-color: #6a11cb;
            border-color: #6a11cb;
            width: 100%;
            font-weight: bold;
        }
        .login-container .btn-primary:hover {
            background-color: #2575fc;
            border-color: #2575fc;
        }
        .login-container .copywriting {
            text-align: center;
            margin-top: 15px;
            color: #888;
            font-size: 14px;
        }
        .password-container {
            position: relative;
        }
        .password-container .form-control {
            padding-right: 40px; /* Adjust space for the eye icon */
        }
        .password-container .fa-eye, .password-container .fa-eye-slash {
            position: absolute;
            right: 10px;
            top: 75%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6a11cb; /* Match color with the button */
            font-size: 18px; /* Adjust size of the icon */
        }
    </style>
    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
</head>
<body>
    <div class="login-container">
        <h2>Selamat Datang!</h2>
        <form action="login_process.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username Anda" required>
            </div>
            <div class="form-group password-container">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Anda" required>
                <i id="eye-icon" class="fas fa-eye" onclick="togglePassword()"></i>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <div class="copywriting">
            <p>&copy; 2024 Fazri Nugraha - Pemrograman Web Framework KSI 5A</p>
        </div>
    </div>
</body>
</html>
