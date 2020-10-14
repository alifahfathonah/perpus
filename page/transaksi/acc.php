<?php

include "detailpengajuanmember.php";
$id_pinjam = $_GET['id_pinjam'];
$tgl_pinjam = date("d-m-Y");
$tujuh_hari = mktime(0,0,0, date("n"), date("j")+7, date("Y"));
$kembali = date("d-m-Y", $tujuh_hari);


$sql = $koneksi->query("update peminjaman set status_peminjaman='pinjam' where id_pinjam='$id_pinjam'");
$sql = $koneksi->query("update peminjaman set tgl_pinjam='$tgl_pinjam' where id_pinjam='$id_pinjam'");
$sql = $koneksi->query("update peminjaman set limit_tanggal='$kembali' where id_pinjam='$id_pinjam'");

?>


<script type = "text/javascript">
alert("Berhasil");
window.location.href="?page=transaksi&aksi=daftarpengajuanpeminjaman";
</script>

<?php
?>