<?php
include 'd:/xampp/htdocs/website-peminjaman-ruangan/test/test_koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data berdasarkan ID
    $hapus = mysqli_query($koneksi, "DELETE FROM form_peminjaman WHERE id='$id'");

    if ($hapus) {
        echo "<script>alert('Data berhasil dihapus'); window.location='peminjaman_terjadwal.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus'); window.location='peminjaman_terjadwal.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location='peminjaman_terjadwal.php';</script>";
}
?>
