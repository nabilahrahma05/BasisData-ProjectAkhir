<?php include("header.php") ?>

<?php
include 'd:/xampp/htdocs/website-peminjaman-ruangan/test/test_koneksi.php';
$Kode_Ruangan = "";
$Fasilitas = "";
$Tipe = "";
$sukses = "";
$error = "";
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "DELETE FROM daftar_ruangan where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sql_reset_ids = "SET @num := 0;";
        $sql_update_ids = "UPDATE daftar_ruangan SET id = (@num := @num + 1);";
        $sql_adjust_increment = "ALTER TABLE daftar_ruangan AUTO_INCREMENT = 1;";
        mysqli_query($koneksi, $sql_reset_ids);
        mysqli_query($koneksi, $sql_update_ids);
        mysqli_query($koneksi, $sql_adjust_increment);
        $sukses = "Berhasil menghapus data";
    } else {
        $error = "Gagal menghapus data";
    }
}
if ($op == "edit") {
    $id = $_GET['id'];
    $sql1 = "select * from daftar_ruangan where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $Kode_Ruangan = $r1['Kode_Ruangan'];
    $Tipe = $r1['Tipe'];
    $Fasilitas = $r1['Fasilitas'];

    if ($Kode_Ruangan == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['Simpan'])) {
    $Kode_Ruangan = $_POST['Kode_Ruangan'];
    $Tipe = $_POST['Tipe'];
    $Fasilitas = $_POST['Fasilitas'];

    if ($Kode_Ruangan && $Tipe && $Fasilitas) {
        if ($op == 'edit') {
            $sql1 = "update daftar_ruangan set Kode_Ruangan = '$Kode_Ruangan',Tipe = '$Tipe', Fasilitas = '$Fasilitas' where id = '$id'";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error = "Data gagal diupdate";
            }
        } else {
            $sql1 = "insert into daftar_ruangan(Kode_ruangan,Tipe,Fasilitas) values ('$Kode_Ruangan','$Tipe','$Fasilitas')";
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
                header("refresh:3;url=daftar_ruangan.php");
            }
            ?>
            <?php
            if ($sukses) {
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $sukses ?>
                </div>
                <?php
                header("refresh:3;url=daftar_ruangan.php");
            }
            ?>
            <form action="" method="POST">
                <div class="mb-3 row">
                    <label for="Kode Ruangan" class="col-sm-2 col-form-label">Kode Ruangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Kode Ruangan" name="Kode Ruangan"
                            value="<?php echo $Kode_Ruangan ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Tipe" class="col-sm-2 col-form-label">Tipe</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="Tipe" id="Tipe">
                            <option value="">- Pilih Tipe Ruangan -</option>
                            <option value="Ruang Kelas" <?php if ($Tipe == "Ruang Kelas")
                                echo "selected" ?>>Ruang Kelas
                                </option>
                                <option value="Laboratorium Komputer" <?php if ($Tipe == "Laboratorium Komputer")
                                echo "selected" ?>>Laboratorium Komputer</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Fasilitas" class="col-sm-2 col-form-label">Fasilitas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Fasilitas" name="Fasilitas"
                                value="<?php echo $Fasilitas ?>">
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
            Daftar Ruangan
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Ruangan</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">Fasilitas</th>
                        <th scope="col">Aksi</th>
                    </tr>
                <tbody>
                    <?php
                    $sql2 = "select * from daftar_ruangan order by id asc";
                    $q2 = mysqli_query($koneksi, $sql2);
                    $urut = 1;
                    while ($r2 = mysqli_fetch_array($q2)) {
                        $id = $r2['id'];
                        $Kode_Ruangan = $r2['Kode_Ruangan'];
                        $Tipe = $r2['Tipe'];
                        $Fasilitas = $r2['Fasilitas'];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $urut++ ?></th>
                            <td scope="row"><?php echo $Kode_Ruangan ?></td>
                            <td scope="row"><?php echo $Tipe ?></td>
                            <td scope="row"><?php echo $Fasilitas ?></td>
                            <td scope="row">
                                <a href="daftar_ruangan.php?op=edit&id=<?php echo $id ?>"><button type="button"
                                        class="btn btn-warning">Edit</button></a>
                                <a href="daftar_ruangan.php?op=delete&id=<?php echo $id ?>"
                                    onclick="return confirm('Yakin mau hapus data?')">
                                    <button type="button" class="btn btn-danger">Hapus</button>
                                </a>

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