<?php
require_once('header_template.php');
<<<<<<< HEAD
?>

<h3>Halaman User</h3>
=======
$data = mysqli_query($host, "SELECT * FROM user");
?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <h3>Data User</h3>
            <hr>
            <div class="table-responsive">
                <table class="table w-100">
                    <thead>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($data as $row) : ?>
                            <td><?= $i++ ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['level'] ?></td>
                            <td>
                                <a href="userEdit.php?id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a>
                                <a href="userHapus.php?id=<?= $row['id'] ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
>>>>>>> bahry

<?php
require_once('footer_template.php');
?>