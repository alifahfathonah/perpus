<?php

include "anggota.php";
$NIS = $_GET['username'];

$sql = $koneksi->query("update user set status='member' where username='$NIS'");


?>
<script type = "text/javascript">
alert("Data Calon Anggota Berhasil Diterima");
window.location.href="?page=anggota";
</script>

<?php
?>
