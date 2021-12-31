<?php
require_once('header_template.php');

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $cek = mysqli_query($host, "SELECT * FROM user WHERE username = '$user'")->fetch_assoc();
    if ($cek) {
        if (password_verify($pass, $cek['password'])) {
            $_SESSION['username'] = $cek['username'];
            $_SESSION['level'] = $cek['level'];
            $_SESSION['id'] = $cek['id'];
            $_SESSION['login'] = true;
            header('location:home.php');
        } else {
            $error = 'username atau password salah';
        }
    } else {
        $error = 'Akun tidak ditemukan silahkan daftar terlebih dahulu';
    }
}

?>

<div class="container">
    <div class="row mt-5">
        <div class="col-sm-12 col-md-6 col-lg-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h3>Login</h3>
                    <p>Masuk untuk menggunakan Aplikasi</p>
                    <hr>
                    <form method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                        <?php if (isset($error)) : ?>
                            <div class="form-group">
                                <small class="text-danger">
                                    <?= $error ?>
                                </small>
                            </div>
                        <?php endif; ?>
                        <div class="d-flex justify-content-between">
                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                            <a href="register.php" class="btn btn-success">Daftar</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
require_once('footer_template.php');
?>