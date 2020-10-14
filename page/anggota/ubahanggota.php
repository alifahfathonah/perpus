<?php

error_reporting(0);

$username = $_GET['username'];

$sql = $koneksi->query("SELECT * FROM  user WHERE username= $username");

$tampil = $sql-> fetch_assoc();

$jk = $tampil['jk'];
$tahun2 = $tampil['tahun_masuk'];

?>


 <div class="panel panel-default">
 <div class="panel-heading">
 <h3>Ubah Data Anggota</h3>
 </div>
 <div class="panel-body">
                            <div class="row">

                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>NIS</label>
                                            <input class="form-control" name="username" type="number" min="0" max="9999999999" maxlength="9" required value="<?php echo $tampil['username']; ?>"/>
                                        </div>

										<div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" name="nama" required value="<?php echo $tampil['nama']; ?>"/>
                                        </div>

                    <div class="form-group">
                                            <label>Jenis Kelamin</label><br/>
                                            <label class="checkbox-inline">
                                              <input type="checkbox" value="l" name="jk"  <?php echo ($jk==l)?"checked":"";
                                              ?> /> Laki-laki
                                            </label>
                                            <label class="checkbox-inline">
                                              <input type="checkbox" value="p" name="jk"  <?php echo ($jk==p)?"checked":"";
                                              ?> /> Perempuan
                                            </label>
                                        </div>

                    									<div class="form-group">
                                            <label>Alamat</label>
                                            <input class="form-control" name="alamat" required value="<?php echo $tampil['alamat']; ?>"/>
                                        </div>

										                    <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" required value="<?php echo $tampil['email']; ?>"/>
                                        </div>

                                        <div class="form-group input-group">
                                          <td colspan="4"><b>Ubah Foto </b></td> <br/>
                                             <input type="file" name="foto" required />
                                           </td>
                                          </div>

                                        <div class="form-group">
                                                                <label>Tahun Masuk Sekolah</label>
                                                                <select class="form-control" name="tahun_masuk" required>
                                                                   <?php
                    												$tahun = date("Y");
                    												for ($i=$tahun-3; $i<=$tahun; $i++){
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

										<div>
										<input type="submit" name="ubah" value="Ubah" class ="btn btn-primary">
										</div>

								</form>
							</div>
 </div>
 </div>
</div>

<?php

    $NIS = $_POST['username'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $tahun_masuk = $_POST['tahun_masuk'];

    if(isset($_POST['ubah'])){
      $foto = $_FILES['foto']['name'];
      $tmp = $_FILES['foto']['tmp_name'];
      $fotobaru = date('dmYhis').$foto;
      $path = "gambar/fotouser/".$fotobaru;

      if(move_uploaded_file($tmp, $path)){
        $sql = $koneksi->query("SELECT * FROM  user WHERE username= $username");
        $tampil = $sql-> fetch_assoc();

        if (is_file("gambar/fotouser/".$tampil['foto']))
          unlink("gambar/fotouser/".$tampil['foto']);
          $sql = $koneksi->query("UPDATE user SET username='$NIS', nama='$nama', jk='$jk',
          alamat='$alamat', email='$email', foto='$fotobaru', tahun_masuk='$tahun_masuk' WHERE username='$username'");

          if ($sql){
            ?>
                <script type="text/javascript">
                    alert ("Ubah Berhasil Disimpan");
                    window.location.href="?page=anggota";
                </script>
            <?php
          }
      }
    }
 ?>
