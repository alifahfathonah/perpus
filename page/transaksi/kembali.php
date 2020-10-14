<?php

include "transaksi.php";
include "detail.php";
$id_pinjam = $_GET['id_pinjam'];
$judul_buku = $_GET['judul_buku'];


$sql = $koneksi->query("update peminjaman set status_peminjaman='kembali' where id_pinjam='$id_pinjam'");
$sql = $koneksi->query("update buku set stok = (stok+1) where judul_buku='$judul_buku'");
$sql = $koneksi->query("UPDATE peminjaman SET terlambat='$lambat hari' WHERE id_pinjam='$id_pinjam'");
$sql = $koneksi->query("UPDATE peminjaman SET denda='$denda1 hari' WHERE id_pinjam='$id_pinjam'");
$sql = $koneksi->query("UPDATE detail_peminjaman SET tgl_kembali ='$tgl_pinjam' WHERE id_pinjam='$id_pinjam'");

?>


<script type = "text/javascript">
alert("Berhasil");
window.location.href="?page=transaksi";
</script>

<?php
?>
