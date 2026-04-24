<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Register Pasien - Qlinic</title>

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

/* card (sama spt login) */
.register-card {
    background: #fff;
    width: 380px;
    padding: 35px;
    border-radius: 18px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
}

/* title */
.register-card h4 {
    text-align: center;
    font-weight: 700;
    color: #0d6efd;
    margin-bottom: 20px;
}

/* input */
.form-box {
    margin-bottom: 15px;
}

.form-box input,
.form-box select {
    width: 100%;
    padding: 12px 15px;
    border-radius: 10px;
    border: 1px solid #ddd;
    outline: none;
    transition: 0.3s;
    box-sizing: border-box;
}

.form-box input:focus,
.form-box select:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 3px rgba(13,110,253,0.1);
}

/* button*/
.btn-register {
    width: 100%;
    padding: 12px;
    border-radius: 10px;
    border: none;
    background: #0d6efd;
    color: white;
    font-weight: 600;
    transition: 0.3s;
}

.btn-register:hover {
    background: #0b5ed7;
    transform: translateY(-2px);
}

/* link*/
.register-card small a {
    color: #0d6efd;
    text-decoration: none;
    font-weight: 500;
}

.register-card small a:hover {
    text-decoration: underline;
}
</style>

</head>

<body>

<div class="register-card">

    <h4>Register</h4>

    <form method="POST" action="proses_register.php">

        <div class="form-box">
            <input type="text" name="nama" placeholder="Nama Lengkap" required>
        </div>

        <div class="form-box">
            <select name="jk" required>
                <option value="">Jenis Kelamin</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div class="form-box">
            <input type="tel" name="no_hp" placeholder="No Telepon" required>
        </div>

        <div class="form-box">
            <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="form-box" style="position: relative;">
    <input type="password" id="password" name="password" placeholder="Password" required>

    
    <span onclick="togglePassword()" 
          style="position:absolute; right:15px; top:50%; transform:translateY(-50%); cursor:pointer;">
        👁
    </span>
</div>

        <button type="submit" class="btn-register">
            Daftar
        </button>

        <div class="text-center mt-3">
            <small>
                Sudah punya akun? <a href="login.php">Login</a>
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