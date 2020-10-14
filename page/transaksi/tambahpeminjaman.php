<?php
$tgl_pinjam = date("d-m-Y");
$tujuh_hari = mktime(0,0,0, date("n"), date("j")+7, date("Y"));
$kembali = date("d-m-Y", $tujuh_hari);
?>

<div class="row">
 <div class="panel panel-default">
 <div class="panel-heading">
 <h3>Tambah Peminjaman Buku</h3>
 </div>
 <div class="panel-body">
        <div class="row" onsubmit="return validasi(this)">
        <form method="POST">

          <div class="form-group">
                <label>Nama Peminjam</label>
                 <select class="form-control" name="peminjam" required/>
    			<?php
    			$sql = $koneksi->query("SELECT * from user where status ='member' order by id_user asc ");
    			while($data= $sql->fetch_assoc()){
    			echo "<option value='$data[id_user]'> NIS $data[username] : $data[nama] : Id Peminjam $data[id_user]  </option>";
    			}
    			?>
    			</select>
             </div>

 			<div class="form-group">
             <label>Nama Buku</label>
             <select class="form-control" name="buku" required/>
 			<?php
 			$sql = $koneksi->query("SELECT * from buku order by id_buku asc");
 			while($data= $sql->fetch_assoc()){
 			echo "<option value='$data[id_buku]' > Id Buku $data[id_buku] : $data[judul_buku] : Stok $data[stok]</option>";
 			}
 			?>
 			</select>
          </div>

 		 <div class="form-group">
             <label>Jumlah Buku</label>
             <input class="form-control" type ="number" name="jumlah" min="1" max="3" value= "1" required/>

 			</select>
          </div>

		 <div class="form-group">
		<label> Tanggal Pinjam </label>
		<input class = "form-control" type="text" name="tgl_pinjam" id="tgl" value="<?php echo $tgl_pinjam;?>" readonly />
		</div>

	    <div class="form-group">
		<label>Limit Tanggal Pengembalian </label>
		<input class = "form-control" type="text" name="limit_tanggal" id="tgl" value="<?php echo $kembali;?>" readonly />
		</div>

    <div class="form-group">
		<input type="submit" name= "tambah" value="Masukkan ke daftar list" class ="btn btn-primary">
		</div>

		</form>

    <?php
    //ambil data dari session
    if(isset($_SESSION['tmpbuku'])){
      $tmpbuku= $_SESSION['tmpbuku'];
    }
    if(isset($_SESSION['tmpjumlah'])){
      $tmpjumlah= $_SESSION['tmpjumlah'];
    }
    if(isset($_SESSION['tmppeminjam'])){
      $tmppeminjam= $_SESSION['tmppeminjam'];
    }
    if(isset($_SESSION['tmptgl_pinjam'])){
      $tmptgl_pinjam = $_SESSION['tmptgl_pinjam'];
    }
    if(isset($_SESSION['tmplimit_tanggal'])){
      $tmplimit_tanggal= $_SESSION['tmplimit_tanggal'];
    } // end data dari session

    //tambahkan array dari data session tadi
    $tmpbuku[] = $_POST['buku'];
    $tmpjumlah[] = $_POST['jumlah'];
    $tmppeminjam[] = $_POST['peminjam'];
    $tmptgl_pinjam[] = $_POST['tgl_pinjam'];
    $tmplimit_tanggal[] = $_POST['limit_tanggal'];
    // end script tambah ke array

    // simpan data array yang baru ke session
    $_SESSION['tmpbuku'] = $tmpbuku;
    $_SESSION['tmpjumlah'] = $tmpjumlah;
    $_SESSION['tmppeminjam'] = $tmppeminjam;
    $_SESSION['tmptgl_pinjam'] = $tmptgl_pinjam;
    $_SESSION['tmplimit_tanggal'] = $tmplimit_tanggal;
    // end script simpan ke session

     ?>

    <br><br><div class="table-responsive">
  <h4><center><b>Daftar list yang akan dipinjam</b></center></h4>
  <table class="table table-striped table-bordered table-hover">
         <thead>
             <tr>
               <th width="10%">No</th>
			   <th width="10%">Id Peminjam </th>
                 <th width="10%">Id Buku</th>
                 <th width="10%">Jumlah</th>
                 <th width="10%">Tanggal Pinjam</th>
                 <th width="10%">Limit Tanggal Pengembalian</th>

               </tr>
             </thead>

               <?php

			   if(isset($_POST['tambah'])){
           $buku = $_POST['buku'];
           $sql = $koneksi->query("SELECT * from buku where id_buku = '$buku' ");
	          while ($data = $sql->fetch_assoc()){
            $sisa = $data['stok'];
		        if($sisa <= 0){
			      ?>
			      <script type ="text/javascript">
			      alert("Stok Buku Habis");
			      window.location.href="?page=transaksi&aksi=tambahpeminjaman";
			      </script>
			      <?php
		        }
	        }

               $no = 1;
               $n = sizeof($_SESSION['tmpbuku']);
		             if($n>4){
			                echo "<script>alert('Maaf daftar list hanya bisa di isi 3 list dan udah penuh, silahkan tekan tombol reset untuk melakukan input ulang ')</script>";
		                  }
		                    else{
               // ambil data dari session
               if (isset($_SESSION['tmpbuku'])) {
                $tmpbuku = $_SESSION['tmpbuku'];
               }
               if (isset($_SESSION['tmpjumlah'])) {
                $tmpjumlah = $_SESSION['tmpjumlah'];
               }
               if (isset($_SESSION['tmppeminjam'])) {
                $tmppeminjam = $_SESSION['tmppeminjam'];
               }
               if (isset($_SESSION['tmptgl_pinjam'])) {
                $tmptgl_pinjam = $_SESSION['tmptgl_pinjam'];
               }
               if (isset($_SESSION['tmpbataspeminjaman'])) {
                $tmplimit_tanggal = $_SESSION['tmplimit_tanggal'];
              }  // End script ambil data

              // Cetak dengan cara uraikan isi arraynya
              for ($i=1; $i < count($tmpbuku); $i++) {
                echo "<tr>";
                echo "<td>".$no++."</td>
                <td>".$tmppeminjam[$i]."</td>
                <td>".$tmpbuku[$i]."</td>
                <td>".$tmpjumlah[$i]."</td>
                <td>".$tmptgl_pinjam[$i]."</td>
                <td>".$tmplimit_tanggal[$i]."</td>
                ";
              }
		        }
          }

            if(isset($_POST["reset"])){
              session_start();
              unset($_SESSION['tmpbuku']);
              unset($_SESSION['tmpjumlah']);
              unset($_SESSION['tmppeminjam']);
              unset($_SESSION['tmptgl_pinjam']);
              unset($_SESSION['tmplimit_tanggal']);
          	}
              ?>
           </table>

           <div>
               <form method="POST">
       		<input type="submit" name= "simpan" value="Simpan" class ="btn btn-primary">&nbsp&nbsp&nbsp&nbsp
			    <input type="submit" name= "reset" value="Reset" class ="btn btn-primary">
              </form>
       		</div>

			<?php

 if(isset($_POST['simpan'])){
	session_start();
	ob_start();

				if (isset($_SESSION['tmpbuku'])) {
                $tmpbuku = $_SESSION['tmpbuku'];
               }
               if (isset($_SESSION['tmpjumlah'])) {
                $tmpjumlah = $_SESSION['tmpjumlah'];
               }
               if (isset($_SESSION['tmppeminjam'])) {
                $tmppeminjam = $_SESSION['tmppeminjam'];
               }
               if (isset($_SESSION['tmptgl_pinjam'])) {
                $tmptgl_pinjam = $_SESSION['tmptgl_pinjam'];
               }
               if (isset($_SESSION['tmpbataspeminjaman'])) {
                $tmplimit_tanggal = $_SESSION['tmplimit_tanggal'];
              }  // End script ambil data

              // Cetak dengan cara uraikan isi arraynya
              for ($i=1; $i < count($tmpbuku); $i++) {
                 "<tr>";
                 "<td>".$no++."</td>
                <td>".$tmppeminjam[$i]."</td>
                <td>".$tmpbuku[$i]."</td>
                <td>".$tmpjumlah[$i]."</td>
                <td>".$tmptgl_pinjam[$i]."</td>
                <td>".$tmplimit_tanggal[$i]."</td>
                ";
				$pinjam = $koneksi->query("INSERT INTO peminjaman( id_user, tgl_pinjam, limit_tanggal, status_peminjaman, terlambat, denda)
			    VALUES ( '$tmppeminjam[$i]', '$tmptgl_pinjam[$i]', '$tmplimit_tanggal[$i]', 'pinjam' , '0 Hari', '0' )");

	if($pinjam){
    $sql = $koneksi->query("INSERT INTO detail_peminjaman (id_buku, id_pinjam,  jumlah,
    tgl_kembali) VALUES ('$tmpbuku[$i]', last_insert_id(), '$tmpjumlah[$i]', '00-00-0000'  )");
    $stok = $koneksi->query("update buku set stok = (stok-$tmpjumlah[$i]) where id_buku='$tmpbuku[$i]'");
				   ?>
 			  <script type="text/javascript">
		      alert ("Buku Berhasil Dipinjam");
			  window.location.href="?page=transaksi&aksi=tambahpeminjaman";
		    </script>
         <?php
			}

      session_start();
      unset($_SESSION['tmpbuku']);
      unset($_SESSION['tmpjumlah']);
      unset($_SESSION['tmppeminjam']);
      unset($_SESSION['tmptgl_pinjam']);
      unset($_SESSION['tmplimit_tanggal']);
	}
}
 ?>


		</div>
	</div>
 </div>
</div>
</div>
