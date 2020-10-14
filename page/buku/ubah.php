<?php

error_reporting(0);

$id_buku = $_GET['id_buku'];

$sql = $koneksi->query("select * from buku where id_buku= $id_buku");

$tampil = $sql-> fetch_assoc();

$tahun2 = $tampil['tahun_buku'];

?>


 <div class="panel panel-default">
 <div class="panel-heading">
 <h3>Ubah Data Buku</h3>
 </div>
 <div class="panel-body">
                            <div class="row">

                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Id</label>
                                            <input class="form-control" name="id_buku" type="number" min="0" max="9999" maxlength="4" required value="<?php echo $tampil['id_buku']; ?>"/>
                                        </div>

										<div class="form-group">
                                            <label>Judul</label>
                                            <input class="form-control" name="judul_buku" required value="<?php echo $tampil['judul_buku']; ?>"/>
                                        </div>

										<div class="form-group">
                                            <label>Genre</label>
                                            <input class="form-control" name="genre_buku" required value="<?php echo $tampil['genre_buku']; ?>"/>
                                        </div>

										<div class="form-group">
                                            <label>Penerbit</label>
                                            <input class="form-control" name="penerbit" required value="<?php echo $tampil['penerbit']; ?>"/>
                                        </div>

                                        <div class="form-group">
                                                                <label>Tahun</label>
                                                                <select class="form-control" name="tahun_buku" required>
                                                                   <?php
                    												$tahun = date("Y");
                    												for ($i=$tahun-30; $i<=$tahun; $i++){
                                              if($i==$tahun2){
                                                echo '<option value = "'.$i.'" selected>'.$i.'</option>';
                                              }else{
                                                echo
                      													'<option value = "'.$i.'">'.$i.'</option>';
                                              }

                    												}
                    											   ?>
                                                                </select>
                                                            </div>

                   <div class="form-group input-group">
                                            <label>Cover Buku</label><br/>
                                            <td colspan="4">Ubah Photo : <input type="file" name="cover" required />
                                        </div>

                  <div class="form-group">
                                            <label>Sinopsis</label>
                                            <input class=form-control name="sinopsis" maxlength="1000" required value="<?php echo $tampil['sinopsis']; ?>"/>
                                        </div>

										<div class="form-group">
                                            <label>Lokasi</label>
                                            <input class="form-control" name="lokasi" required value="<?php echo $tampil['lokasi']; ?>"/>
                                        </div>

										<div class="form-group">
                                            <label>Stok</label>
                                            <input class="form-control" type ="number" name="stok" min="0" max=99999 maxlength="5" required value="<?php echo $tampil['stok']; ?>"/>
                                        </div>

                    <div class="form-group">
                                            <label>Sumber Pendanaan</label>
                                            <input class="form-control" name="sumber" required value="<?php echo $tampil['sumber']; ?>"/>
                                       </div>

                    <div class="form-group">
                                            <label>Harga</label>
                                            <input class="form-control" type ="number" name="harga" min="0" required value="<?php echo $tampil['harga']; ?>"/>
                                        </div>
										<div>
										<input type="submit" name= "ubah" value="Ubah" class ="btn btn-primary">
										</div>

								</form>
							</div>
 </div>
 </div>
</div>

<?php

    $id_buku = $_POST['id_buku'];
    $judul_buku = $_POST['judul_buku'];
    $genre_buku = $_POST['genre_buku'];
    $penerbit = $_POST['penerbit'];
    $tahun_buku = $_POST['tahun_buku'];
    $sinopsis = ($_POST['sinopsis']);
    $lokasi = ($_POST['lokasi']);
    $stok = ($_POST['stok']);
    $sumber = ($_POST['sumber']);
    $harga = ($_POST['harga']);

    if(isset($_POST['ubah'])){
      $foto = $_FILES['cover']['name'];
      $tmp = $_FILES['cover']['tmp_name'];
      $fotobaru = date('dmYhis').$foto;
      $path = "gambar/buku/".$fotobaru;

      if(move_uploaded_file($tmp, $path)){
        $sql = $koneksi->query("SELECT * FROM  buku WHERE id_buku= $id_buku");
        $tampil = $sql-> fetch_assoc();

        if (is_file("gambar/buku/".$tampil['cover']))
          unlink("gambar/buku/".$tampil['cover']);
          $sql = $koneksi->query("UPDATE buku SET id_buku='$id_buku', judul_buku='$judul_buku', genre_buku='$genre_buku',
          penerbit='$penerbit', tahun_buku='$tahun_buku', cover='$fotobaru', sinopsis='$sinopsis', lokasi='$lokasi',
          stok='$stok', sumber='$sumber', harga='$harga'  WHERE id_buku='$id_buku'");

          if ($sql){
            ?>
                <script type="text/javascript">
                    alert ("Ubah Berhasil Disimpan");
                    window.location.href="?page=buku";
                </script>
            <?php
          }
      }
    }
 ?>
