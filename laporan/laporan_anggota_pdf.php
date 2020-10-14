<?php

$koneksi = new mysqli("localhost", "root", "", "dbperpus");

$content = '
<style type = "text/css">
	.tabel{border-collapse: collapse;}
	.tabel th{padding:8px 5px; background-color: #cccccc}
	.tabel td{padding:8px 5px; }

</style>

';

	$content .= '

<page>

<h2> Laporan Seluruh Data Anggota Perpustakaan SMA PGRI 2 Palembang </h2>

<table border = "1" class="tabel">

<tr>
	<th>No</th>
	<th>NIS</th>
    <th>Nama</th>
    <th>JK</th>
	<th>Alamat</th>
	<th>Email</th>
	<th>Tahun Masuk Sekolah</th>
</tr>';


	$no = 1;
	$sql = $koneksi->query("select*from user where status='member'");
	while($data= $sql->fetch_assoc()){


	$content .= '

	<tr>
	<td style="text-align:center;">'.$no++.'</td>
	<td style="text-align:center;">'.$data['username'].'</td>
	<td style="text-align:center;">'.$data['nama'].'</td>
	<td style="text-align:center;">'.$data['jk'].'</td>
	<td style="text-align:center;">'.$data['alamat'].'</td>
	<td style="text-align:center;">'.$data['email'].'</td>
	<td style="text-align:center;">'.$data['tahun_masuk'].'</td>


	</tr>

	';

	}
	$content .= '

</table>

</page>';

require_once('../assets/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P', 'A4', 'fr');
$html2pdf->WriteHTML($content);
$html2pdf->Output('exampe.pdf')
?>
