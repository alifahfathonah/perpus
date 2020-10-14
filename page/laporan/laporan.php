

 <div class="panel-heading">
 <h3><b>Cetak Laporan</b></h3>
 </div>
 <div class="panel-body">
    <div class="row">
        <div class="col-md-12" onsubmit="return validasi(this)">
        <form method="POST">

        <div class="form-group">
                <label>Laporan</label>
                 <select class="form-control" name="laporan" required/>
					<option value = "Buku"> Buku </option>
					<option value = "Member"> Member </option>
					<option value = "Peminjaman"> Peminjaman </option>
					<option value = "Riwayat"> Riwayat </option>
    			</select>
        </div>
		<div>


		<input type = "submit" class="btn btn-primary" target = "blank"  name = "cetak"  value = "Export to PDF"> &nbsp&nbsp
		<input type = "submit" class="btn btn-success" target = "blank"  name = "cetak2"  value = "Export to Excel">

		</div>
		</form>


		<?php


		if(isset($_POST['cetak'])){
			switch($_POST['laporan']){
			case 'Buku':
			header("location:./laporan/laporan_buku_pdf.php");
			break;
			}
			switch($_POST['laporan']){
			case 'Member':
			header("location:./laporan/laporan_anggota_pdf.php");
			break;
			}
			switch($_POST['laporan']){
			case 'Peminjaman':
			header("location:./laporan/laporan_transaksi_pdf.php");
			break;
			}
			switch($_POST['laporan']){
			case 'Riwayat':
			header("location:./laporan/laporan_riwayat_pdf.php");
			break;
			}
		}

		?>

		<?php


		if(isset($_POST['cetak2'])){
			switch($_POST['laporan']){
			case 'Buku':
			header("location:./laporan/laporan_buku_excel.php");
			break;
			}
			switch($_POST['laporan']){
			case 'Member':
			header("location:./laporan/laporan_anggota_excel.php");
			break;
			}
			switch($_POST['laporan']){
			case 'Peminjaman':
			header("location:./laporan/laporan_transaksi_excel.php");
			break;
			}
			switch($_POST['laporan']){
			case 'Riwayat':
			header("location:./laporan/laporan_riwayat_excel.php");
			break;
			}
		}

		?>

		</div>
	</div>
 </div>
