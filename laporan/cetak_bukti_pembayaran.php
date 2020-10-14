<?php
session_start();
ob_start();
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

<img src="kop.jpg" width="750">
<h3>Silahkan Tunjukkan Bukti Pembayaran ini ke Perpustakaan</h3>

<table border = "1" class="tabel">

<tr>
	<th style="text-align:center;">No</th>
	<th style="text-align:center;">Id Pinjam</th>
	<th style="text-align:center;">NIS</th>
	<th style="text-align:center;">Nama</th>
    <th style="text-align:center;">Judul Buku</th>
    <th style="text-align:center;">Stok</th>
	<th style="text-align:center;">Tanggal Pinjam</th>
	<th style="text-align:center;">Status</th>

</tr>';


	$no = 1;
	$sql = $koneksi->query("SELECT * from peminjaman,user, buku, detail_peminjaman
	where peminjaman.id_user = user.id_user
	and detail_peminjaman.id_pinjam = peminjaman.id_pinjam
	and detail_peminjaman.id_buku = buku.id_buku
	and peminjaman.id_user ='".$_SESSION['member']."'
	and peminjaman.status_peminjaman='onProses'"
	);
	while($data= $sql->fetch_assoc()){


	$content .= '

	<tr>

	<td style="text-align:center;">'.$no++.'</td>
	<td style="text-align:center;">'.$data['id_pinjam'].'</td>
	<td style="text-align:center;">'.$data['username'].'</td>
	<td style="text-align:center;">'.$data['nama'].'</td>
	<td style="text-align:center;">'.$data['judul_buku'].'</td>
	<td style="text-align:center;">'.$data['jumlah'].'</td>
	<td style="text-align:center;">'.$data['tgl_pinjam'].'</td>
	<td style="text-align:center;">'.$data['status_peminjaman'].'</td>

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
