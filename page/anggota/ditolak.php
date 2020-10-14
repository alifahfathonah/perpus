<?php
$NIS= $_GET['username'];
$koneksi->query("delete from user where username = '$NIS'");
 ?>

 <script type="text/javascript">
   alert ("Data Calon Anggota Berhasil Ditolak");
   window.location.href="?page=anggota";
 </script>
