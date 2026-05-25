<?php include("header.php") ?>
<div class="welcome-section">
    <h2>Peminjaman Terjadwal</h2>
</div>
<table class="table">
    <tr>
        <th>id</th>
        <th>Tanggal</th>
        <th>Kode Ruangan</th>
        <th>Peminjam</th>
        <th>Kelas</th>
        <th>Kegiatan</th>
        <th>Mulai</th>
        <th>Selesai</th>
        <th>Aksi</th>
    </tr>
    <?php
    include 'd:/xampp/htdocs/website-peminjaman-ruangan/test/test_koneksi.php';
    $ambildata = mysqli_query($koneksi, "select id, Tanggal_Peminjaman, Kode_Ruangan, Nama_Lengkap, Kelas, Kegiatan, Waktu_mulai, Waktu_selesai from form_peminjaman");
    while ($tampil = mysqli_fetch_array($ambildata)) {
        echo "
        <tr>
            <td>$tampil[id]</td>
            <td>$tampil[Tanggal_Peminjaman]</td>
            <td>$tampil[Kode_Ruangan]</td>
            <td>$tampil[Nama_Lengkap]</td>
            <td>$tampil[Kelas]</td>
            <td>$tampil[Kegiatan]</td>
            <td>$tampil[Waktu_mulai]</td>
            <td>$tampil[Waktu_selesai]</td>
            <td><a href='hapus.php?id={$tampil['id']}' class='btn btn-danger'>Hapus</a></td>
        </tr>";
    }
    ?>
</table>
<?php include("footer.php") ?>