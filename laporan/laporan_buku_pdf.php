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

<h2> Laporan Seluruh Data Buku Perpustakaan SMA PGRI 2 Palembang </h2>

<table border = "1" class="tabel">

<tr>
		<th style="text-align:center;">No</th>
        <th style="text-align:center;">Id</th>
        <th style="text-align:center;">Judul Buku</th>
        <th style="text-align:center;">Genre Buku</th>
        <th style="text-align:center;">Penerbit</th>
		<th style="text-align:center;">Tahun Buku</th>
		<th style="text-align:center;">Lokasi</th>
		<th style="text-align:center;">Stok</th>
</tr>';


	$no = 1;
	$sql = $koneksi->query("select*from buku");
	while($data= $sql->fetch_assoc()){


	$content .= '

	<tr>
	<td style="text-align:center;">'.$no++.'</td>
	<td style="text-align:center;">'.$data['id_buku'].'</td>
	<td style="text-align:center;">'.$data['judul_buku'].'</td>
	<td style="text-align:center;">'.$data['genre_buku'].'</td>
	<td style="text-align:center;">'.$data['penerbit'].'</td>
	<td style="text-align:center;">'.$data['tahun_buku'].'</td>
	<td style="text-align:center;">'.$data['lokasi'].'</td>
	<td style="text-align:center;">'.$data['stok'].'</td>

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
