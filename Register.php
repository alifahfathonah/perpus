<?php

error_reporting(0);

$koneksi = mysqli_connect("localhost", "root", "", "dbperpus");

if (isset($_POST['buatakun'])){
  session_start();
  $NIS = ($_POST['username']);
  $nama = ($_POST['nama']);
  $jk = ($_POST['jk']);
  $alamat = ($_POST['alamat']);
  $email = ($_POST['email']);

  $image = $_FILES['image']['name'];
  $fotobaru = date('dmYHis').$image; //untuk mengubah nama berdasarkan tanggal dan jam upload
  $target = "gambar/fotocalon/".basename($fotobaru);

  $password = ($_POST['pass']);
  $password2 = ($_POST['pass2']);
  $tahum_masuk = ($_POST['tahun_masuk']);


  if ($password ==$password2){
    $password = md5($password);
    $sql = "INSERT INTO user(username, nama, jk, alamat, email, foto,
    pass, tahun_masuk) VALUES ('$NIS', '$nama', '$jk', '$alamat', '$email', '$fotobaru', '$password',
    '$tahum_masuk')";

    mysqli_query($koneksi, $sql);

    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    ?>
   <script type="text/javascript">
     alert ("Akun perpus telah berhasil di daftarkan, silahkan tunggu atau temui admin untuk menkonfirmasi akun anda");
     window.location.href="Home.php";
   </script>
    <?php
  }else{
    ?>
   <script type="text/javascript">
     alert ("Password yang anda masukan tidak sama");
   </script>
    <?php
  }
}

$result = mysqli_query($koneksi, "SELECT * FROM user");


?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Perpustakaan SMA PGRI 2 Palembang</title>
<!-- BOOTSTRAP STYLES-->
<link href="assets/css/bootstrap.css" rel="stylesheet" />
 <!-- FONTAWESOME STYLES-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CUSTOM STYLES-->
<link href="assets/css/custom.min.css" rel="stylesheet" />
<link href="assets/css/custom.css" rel="stylesheet" />

 <!-- GOOGLE FONTS-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   <div id="header-wrapper">
   <img  src="assets/img/atas.jpg"  width="100%"/>
   </div>
</head>
<body>

<div id="page-inner" color>
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse" >
                <ul class="nav" id="pendaftaran">

                    <li><b>
                         <div  style="color: white; padding: 15px 20px 15px 20px; font-size: 16px;" p align="center">
							Pendaftaran Anggota Perpustakaan &nbsp; </div>
            </b></li>
					<li>
                         <div style="color: white; padding: 15px 20px 15px 20px; font-size: 16px;" p align="justify">
						 Pendaftaran hanya bisa dilakukan oleh siswa siswi SMA PGRI 2 Palembang silahkan
						 isi data pada form yang telah disediakan. </div>
                    </li>
</div>
        </nav>

        <!-- /. NAV SIDE  -->
            <div id="page-inner">
                <div class="row">
                     <h2><center>Daftar</Center></h2>

                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input type="number" class="form-control" name="username" max="9999999999" placeholder="NISN" required/>
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required />
                                        </div>
                                        <div class="form-group input-group">
                                               <label>Jenis Kelamin</label><br/>
                                               <label class="checkbox-inline">
                                                 <input type="checkbox" name="jk" value="l"/> Laki - laki
                                               </label>
                                               <label class="checkbox-inline">
                                                 <input type="checkbox" name="jk" value="p"/> Perempuan
                                               </label>
                                           </div>
                                        <div class="form-group input-group">
                                                <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                                <input type="text" class="form-control" name="alamat" placeholder="Alamat" required />
                                          </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="text" class="form-control" name="email" placeholder="Email" required />
                                        </div>
                                        <div class="form-group input-group">
                                          <td colspan="4">Upload Photo : <input type="file" name="image" required />
                                          </div>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" name="pass" min="" placeholder="Password" required />
                                        </div>
                                        <div class="form-group input-group">
                                              <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                              <input type="password" class="form-control" name="pass2" placeholder="Password Again" required />
                                          </div>

                                        <div class="form-group input-group">
                                                                <label>Tahun Masuk Sekolah</label>
                                                                <select class="form-control" name="tahun_masuk" required>
                                                                   <?php
                    												$tahun = date("Y");
                    												for ($i=$tahun-3; $i<=$tahun; $i++){
                    													echo
                    													'<option value = "'.$i.'">'.$i.'</option>';
                    												}
                    											   ?>
                                                                </select>
                                                            </div>

                                        <div>
                                          <input type="submit" class="btn btn-success " name="buatakun" value="Buat Akun">
                                        </div> <hr/>
                                    Sudah punya akun?  <a href="Home.php" >Login disini</a>
                                    </form>

                            </div>
                        </div>
                    </div>
</div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
    </div>
             <!-- /. PAGE INNER  -->
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

</body>
</html>
