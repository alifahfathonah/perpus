<?php
$koneksi = new mysqli("localhost", "root", "", "dbperpus");

$filename= "Data Anggota (".date('d-m-Y').").xls";
header ("content-disposition: attachment; filename='$filename'");
header ("content-type: application/vdn.ms-excel");
?>

<h2>Laporan Seluruh Data Anggota Perpustakaan SMA PGRI 2 Palembang</h2>

<table border = "1">
<tr>

	<th>No</th>
	<th>NIS</th>
    <th>Nama</th>
    <th>JK</th>
	<th>Alamat</th>
	<th>Email</th>
	<th>Tahun Masuk Sekolah</th>


</tr>

<?php
	$no = 1;
	$sql = $koneksi->query("select*from user where status='member'");
	while($data= $sql->fetch_assoc()){

	?>
	<tr>
	<td><?php echo $no++; ?></td>
	<td><?php echo $data['username'];?></td>
	<td><?php echo $data['nama'];?></td>
	<td><?php echo $data['jk'];?></td>


	<td><?php echo $data['alamat'];?></td>
	<td><?php echo $data['email'];?></td>
	<td><?php echo $data['tahun_masuk'];?></td>

	</tr>

	<?php
	}
	?>
</table>
