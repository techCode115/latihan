<?php
require_once('header_template.php');
if (isset($_POST['daftar'])) {
    $username = $_POST['username'];
    $passwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
    mysqli_query($host, "INSERT INTO user VALUES(null,'$username','$passwd','member')");
    if (mysqli_affected_rows($host) > 0) {
        header('location:login.php');
    } else {
        $error = true;
    }
}
?>

<div class="container">
    <div class="row">
        <div class="card mt-5 mx-auto col-sm-12 col-md-6 col-lg-5 ">
            <div class="card-body">
                <h3 align="center">Buat Akun</h3>
                <hr>
                <form method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="Masukkan Username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Masukkan Password" class="form-control">
                    </div>
                    <?php if (isset($error)) : ?>
                        <small class="text-danger">Pendaftaran Gagal</small>
                    <?php endif; ?>
                    <div class="form-group">
                        <a href="index.php" class="btn btn-primary w-30">Kembali</a>
                        <button class="btn btn-primary w-30" type="submit" name="daftar">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require_once('footer_template.php');
?>