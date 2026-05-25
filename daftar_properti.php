<?php include("header.php") ?>

<?php
include 'd:/xampp/htdocs/website-peminjaman-ruangan/test/test_koneksi.php';
$Properti = "";
$Jumlah = "";
$sukses = "";
$error = "";
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "DELETE FROM daftar_properti WHERE id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        // Menghapus data berhasil, urutkan ulang ID
        $sql2 = "SET @num := 0";
        $sql3 = "UPDATE daftar_properti SET id = (@num := @num + 1)";
        $sql4 = "ALTER TABLE daftar_properti AUTO_INCREMENT = 1";
        mysqli_query($koneksi, $sql2); // Menginisialisasi variabel num
        mysqli_query($koneksi, $sql3); // Mengatur ulang ID
        mysqli_query($koneksi, $sql4); // Mengatur ulang AUTO_INCREMENT
        $sukses = "Berhasil menghapus data";
    } else {
        $error = "Gagal menghapus data";
    }
}
if ($op == "edit") {
    $id = $_GET['id'];
    $sql1 = "select * from daftar_properti where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $Properti = $r1['Properti'];
    $Jumlah = $r1['Jumlah'];

    if ($Properti == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['Simpan'])) {
    $Properti = $_POST['Properti'];
    $Jumlah = $_POST['Jumlah'];

    if ($Properti && $Jumlah) {
        if ($op == 'edit') {
            $sql1 = "update daftar_properti set Properti = '$Properti',Jumlah = '$Jumlah' where id = '$id'";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error = "Data gagal diupdate";
            }
        } else {
            $sql1 = "insert into daftar_properti(Properti,Jumlah) values ('$Properti','$Jumlah')";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = 'Berhasil memasukkan data';
            } else {
                $error = 'Gagal memasukkan data';
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
?>

<div class="mx-auto">
    <div class="card">
        <div class="card-header">
            Buat/edit
        </div>
        <div class="card-body">
            <?php
            if ($error) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error ?>
                </div>
                <?php
                header("refresh:3;url=daftar_properti.php");
            }
            ?>
            <?php
            if ($sukses) {
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $sukses ?>
                </div>
                <?php
                header("refresh:3;url=daftar_properti.php");
            }
            ?>
            <form action="" method="POST">
                <div class="mb-3 row">
                    <label for="Properti" class="col-sm-2 col-form-label">Properti</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Properti" name="Properti"
                            value="<?php echo $Properti ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Jumlah" name="Jumlah" value="<?php echo $Jumlah ?>">
                    </div>
                </div>
                <div class="col-12">
                    <input type="submit" name="Simpan" value="Simpan Data" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Daftar Properti
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Properti</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Aksi</th>
                    </tr>
                <tbody>
                    <?php
                    $sql2 = "select * from daftar_properti order by id asc";
                    $q2 = mysqli_query($koneksi, $sql2);
                    $urut = 1;
                    while ($r2 = mysqli_fetch_array($q2)) {
                        $id = $r2['id'];
                        $Properti = $r2['Properti'];
                        $Jumlah = $r2['Jumlah'];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $urut++ ?></th>
                            <td scope="row"><?php echo $Properti ?></td>
                            <td scope="row"><?php echo $Jumlah ?></td>
                            <td scope="row">
                                <a href="daftar_properti.php?op=edit&id=<?php echo $id ?>"><button type="button"
                                        class="btn btn-warning">Edit</button></a>
                                <a href="daftar_properti.php?op=delete&id=<?php echo $id ?>"
                                    onclick="return confirm('Yakin mau hapus data?')"><button type="button"
                                        class="btn btn-danger">Hapus</button></a>

                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>
<?php include("footer.php") ?>