<div class="panel panel-default">
<div class="panel-heading">
<h3>Tambah Data Buku</h3>
</div>
<div class="panel-body">
                           <div class="row">
                              

                                   <form action="" method="POST" enctype="multipart/form-data">
                                       <div class="form-group">
                                           <label>Id</label>
                                           <input class="form-control" name="id_buku" type="number" min="0" max="9999" maxlength="4" required/>
                                       </div>

                   <div class="form-group">
                                           <label>Judul</label>
                                           <input class="form-control" name="judul_buku" required />
                                       </div>

                   <div class="form-group">
                                           <label>Genre</label>
                                           <input class="form-control" name="genre_buku" required />
                                       </div>

                   <div class="form-group">
                                           <label>Penerbit</label>
                                           <input class="form-control" name="penerbit" required />
                                       </div>

                                       <div class="form-group">
                                                               <label>Tahun</label>
                                                               <select class="form-control" name="tahun_buku" required>
                                                                  <?php
                                           $tahun = date("Y");
                                           for ($i=$tahun-30; $i<=$tahun; $i++){
                                             echo
                                             '<option value = "'.$i.'">'.$i.'</option>';
                                           }
                                            ?>
                                                               </select>
                                                           </div>

                   <div class="form-group input-group">
                                           <label>Cover Buku</label><br/>
                                           <td colspan="4">Upload Photo : <input type="file" name="cover"/>
                                       </div>

                   <div class="form-group">
                                           <label>Sinopsis</label>
                                           <input class=form-control name="sinopsis" required />
                                       </div>

                   <div class="form-group">
                                           <label>Lokasi</label>
                                           <input class="form-control" name="lokasi" required />
                                       </div>

                   <div class="form-group">
                                           <label>Stok</label>
                                           <input class="form-control" type ="number" name="stok" min="0" max=99999 maxlength="5" required />
                                       </div>

                  <div class="form-group">
                                            <label>Sumber Pendanaan</label>
                                            <input class="form-control" name="sumber" required />
                                        </div>

                  <div class="form-group">
                                            <label>Harga</label>
                                            <input class="form-control" type ="number" name="harga" min="0" required />
                                      </div>
                   <div>
                   <input type="submit" name= "simpan" value="simpan" class ="btn btn-primary">
                   </div>


               </form>
             </div>
</div>
</div>

<?php
   if(isset($_POST[simpan])){
      $folder = './gambar/buku/'; //tempat letak folder
      $name_p = $_FILES['cover']['name'];
      $rename = date('Hs').$name_p; //ubah nama gambar
      $sumber_p = $_FILES['cover']['tmp_name'];
      $insert = mysqli_query($koneksi, "INSERT INTO buku VALUES('".$_POST['id_buku']."','".$_POST['judul_buku']."',
      '".$_POST['genre_buku']."','".$_POST['penerbit']."','".$_POST['tahun_buku']."','".$rename."','".$_POST['sinopsis']."',
    '".$_POST['lokasi']."','".$_POST['stok']."','".$_POST['sumber']."','".$_POST['harga']."')");

     move_uploaded_file($sumber_p, $folder.$rename); //memindahkan gambar ke folder

     if($insert){
        ?>
       <script type="text/javascript">
         alert ("Data Berhasil Disimpan");
          window.location.href="?page=buku";
       </script>
        <?php
     }
}

?>
