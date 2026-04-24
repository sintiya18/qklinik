<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Pasien - Qlinic</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f0f6ff;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* card login */
        .login-card {
            background: #ffffff;
            width: 380px;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .login-card h4 {
            font-weight: 700;
            color: #0d6efd;
            margin-bottom: 25px;
        }

        /* logo*/
        .logo {
            text-align: center;
            margin-bottom: 15px;
        }

        .logo img {
            width: 70px;
        }

        .form-box {
    margin-bottom: 15px;
}

.form-box input {
    width: 100%;
    padding: 12px 15px;
    border-radius: 10px;
    border: 1px solid #ddd;
    outline: none;
    transition: 0.3s;

    display: block;
    box-sizing: border-box; 
}

.form-box input:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 3px rgba(13,110,253,0.1);
}

        /* button*/
        .btn-login {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: none;
            background: #0d6efd;
            color: white;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #0b5ed7;
            transform: translateY(-2px);
        }

        /* link*/
        .login-card small a {
            color: #0d6efd;
            text-decoration: none;
            font-weight: 500;
        }

        .login-card small a:hover {
            text-decoration: underline;
        }

        .login-card h4 {
    text-align: center;
    width: 100%;
}
    </style>
</head>

<body>

<div class="login-card">

   
    <div class="logo">
        <img src="../assets/img/logo.png" alt="Qlinic">
    </div>

    <h4 class="text-center">Login</h4>

    <form method="POST" action="proses_login.php">

        <div class="form-box">
            <input type="email" name="email" placeholder="Masukkan Email" required>
        </div>

        <div class="form-box" style="position: relative;">
    <input type="password" id="password" name="password" placeholder="Password" required>

    <span onclick="togglePassword()" 
          style="position:absolute; right:15px; top:50%; transform:translateY(-50%); cursor:pointer;">
        👁
    </span>
</div>
        <button type="submit" class="btn-login">
            Login
        </button>

        <div class="text-center mt-3">
            <small>
                Belum punya akun? <a href="register.php">Daftar</a>
            </small>
        </div>

    </form>

</div>
<script>
function togglePassword() {
    var input = document.getElementById("password");

    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
}
</script>

</body>
</html>