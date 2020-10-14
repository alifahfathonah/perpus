<?php

include "detailpengajuanmember.php";
$id_pinjam = $_GET['id_pinjam'];


$sql = $koneksi->query("update peminjaman set status_peminjaman='tolak' where id_pinjam='$id_pinjam'");

?>


<script type = "text/javascript">
alert("Berhasil");
window.location.href="?page=transaksi&aksi=daftarpengajuanpeminjaman";
</script>

<?php
?>