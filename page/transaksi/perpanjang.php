<?php

$id_pinjam = $_GET['id_pinjam'];
$judul_buku = $_GET['judul_buku'];
$limit_tanggal = $_GET['limit_tanggal'];
$lambat = $_GET['lambat'];

if($lambat >= 1){
  ?>
    <script type="text/javascript">
      alert("Pinjam Buku Tidak dapat diperpanjang, karena lebih dari 7 hari.. Kembalikan Dahulu Kemudian Pinjam Kembali");
      window.location.href="?page=transaksi";
    </script>
  <?php
}else{
  $pecah_tgl_kembali = explode("-", $limit_tanggal);
  $next_7_hari = mktime(0,0,0, $pecah_tgl_kembali[1], $pecah_tgl_kembali[0]+7, $pecah_tgl_kembali[2]);
  $hari_next = date("d-m-y", $next_7_hari);

  $sql = $koneksi->query("update peminjaman set limit_tanggal = '$hari_next' where id_pinjam= '$id_pinjam'");

if($sql){
  ?>
  <script type= "text/javascript">
  alert("Perpanjangan berhasil");
  window.location.href="?page=transaksi";
  </script>

  <?php
}else{
  ?>
  <script type= "text/javascript">
  alert("Perpanjangan gagal");
  window.location.href="?page=transaksi";
</script>
<?php
}
}

?>
