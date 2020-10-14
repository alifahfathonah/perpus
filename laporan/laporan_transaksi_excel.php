<?php
$koneksi = new mysqli("localhost", "root", "", "dbperpus");

$filename= "Data Peminjaman (".date('d-m-Y').").xls";
header ("content-disposition: attachment; filename='$filename'");
header ("content-type: application/vdn.ms-excel");
?>

<h2>Laporan Seluruh Peminjaman Perpustakaan SMA PGRI 2 Palembang</h2>

<table border = "1">
<tr>

	<th style="text-align:center;">No</th>
	<th style="text-align:center;">NIS</th>
    <th style="text-align:center;">Nama</th>
    <th style="text-align:center;">Judul Buku</th>
    <th style="text-align:center;">Jumlah</th>
    <th style="text-align:center;">Tanggal Pinjam</th>
	<th style="text-align:center;">Batas Peminjaman</th>
	<th style="text-align:center;">Terlambat</th>
	<th style="text-align:center;">denda</th>

</tr>

<?php
	$no = 1;
	$sql = $koneksi->query("SELECT * from peminjaman,user, buku, detail_peminjaman
	where peminjaman.id_user = user.id_user
	and detail_peminjaman.id_pinjam = peminjaman.id_pinjam
	and detail_peminjaman.id_buku = buku.id_buku
	and peminjaman.status_peminjaman='pinjam'");
	while($data= $sql->fetch_assoc()){

	?>
	<tr>
	<td><?php echo $no++; ?></td>
	<td><?php echo $data['username'];?></td>
	<td><?php echo $data['nama'];?></td>
	<td><?php echo $data['judul_buku'];?></td>
	<td><?php echo $data['jumlah'];?></td>
	<td><?php echo $data['tgl_pinjam'];?></td>
	<td><?php echo $data['limit_tanggal'];?></td>
	<td><?php echo $data['terlambat'];?></td>
	<td><?php echo $data['denda'];?></td>

	</tr>

	<?php
	}
	?>
</table>
