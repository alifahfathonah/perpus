<?php
$koneksi = new mysqli("localhost", "root", "", "dbperpus");

$filename= "Data Buku (".date('d-m-Y').").xls";
header ("content-disposition: attachment; filename='$filename'");
header ("content-type: application/vdn.ms-excel");
?>

<h2>Laporan Seluruh Data Buku Perpustakaan SMA PGRI 2 Palembang</h2>

<table border = "1">
<tr>
		<th>No</th>
        <th>Id</th>
        <th>Judul Buku</th>
        <th>Genre Buku</th>
        <th>Penerbit</th>
		<th>Tahun Buku</th>
		<th>Lokasi</th>
		<th>Stok</th>


</tr>

<?php
	$no = 1;
	$sql = $koneksi->query("select*from buku");
	while($data= $sql->fetch_assoc()){



	?>
	<tr>
	<td><?php echo $no++; ?></td>
	<td><?php echo $data['id_buku'];?></td>
	<td><?php echo $data['judul_buku'];?></td>
	<td><?php echo $data['genre_buku'];?></td>
	<td><?php echo $data['penerbit'];?></td>
	<!-- <td><?php echo "<img src='gambar/".$data['gambar']."' width='100px' height='100px'/>"; ?></td> -->
	<td><?php echo $data['tahun_buku'];?></td>
	<td><?php echo $data['lokasi'];?></td>
	<td><center><?php echo $data['stok'];?></center></td>

	</tr>

	<?php
	}
	?>
</table>
