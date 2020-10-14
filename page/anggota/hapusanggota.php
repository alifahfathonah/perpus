<?php
$NIS= $_GET['username'];
$koneksi->query("delete from user where username = '$NIS'");
 ?>

 <script type="text/javascript">
   alert ("Data Berhasil Dihapus");
   window.location.href="?page=anggota";
 </script>
