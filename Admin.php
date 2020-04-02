<?php
error_reporting(0);
session_start();

include "function.php";

$koneksi = new mysqli("localhost", "root", "", "dbperpus");

	if($_SESSION['admin']){


?>
<!DOCTYPE html>
<html>
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



    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top "  role="navigation" style="margin-bottom: 0" >
            <div class="navbar-header" >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse" >
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-side" href="admin.php">  <div> <img  src="assets/img/hai.png"  width="100%"/></div> </a>
            </div>
<div style="color: white;
padding: 15px 50px 10px 50px;
float: right;
font-size: 16px;"> <a href="logout.php" class="btn btn-primary square-btn-adjust">Logout</a> </div>
        </nav>
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>


          <li><b>
               <div> <img  src="assets/img/menu.png"  width="100%"/> </div>
          </b></li>
                    <li>
                    <a  href="?page=buku"><i class="fa fa-book fa-2x"></i> Data Buku</a>
                    </li>
                    <li>
                    <a  href="?page=anggota"><i class="	fa fa-users fa-2x"></i> Data Anggota</a>
                    </li>
                    <li>
                    <a  href="?page=transaksi"><i class="fa fa-shopping-cart fa-2x"></i> Transaksi</a>
                    </li>
					          <li>
                    <a  href="?page=riwayat"><i class="fa fa-history fa-2x"></i> Riwayat</a>
                    </li>
					          <li>
                    <a  href="?page=laporan"><i class="fa fa-sticky-note-o fa-2x"></i> Laporan</a>
                    </li>
                </ul>
            </div>

        </nav>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">


                      <?php
					  $page = isset($_GET['page']) ? $_GET['page'] : null;
                      $aksi = isset($_GET['aksi']) ? $_GET['aksi'] : null;
                      if ($page == "buku") {
                      if($aksi == "") {
                          include "page/buku/buku.php";
                      } elseif($aksi =="tambahbuku"){
							            include "page/buku/tambahbuku.php";
						            } elseif($aksi =="ubah"){
                         include "page/buku/ubah.php";
                      }elseif($aksi =="hapus"){
                         include "page/buku/hapus.php";
                         }
                      }elseif ($page == "anggota") {
                        if($aksi == "") {
                         include "page/anggota/anggota.php";
                        }elseif($aksi =="ubahanggota"){
                         include "page/anggota/ubahanggota.php";
                        }elseif($aksi =="hapusanggota"){
                         include "page/anggota/hapusanggota.php";
											 }elseif($aksi =="daftarpengajuancalonanggota"){
                          include "page/anggota/daftarpengajuancalonanggota.php";
												}elseif($aksi =="ditolak"){
	                           include "page/anggota/ditolak.php";
	                      }elseif($aksi =="diterima"){
		 	                   include "page/anggota/diterima.php";
		 	                   }
                      }elseif ($page == "transaksi") {
						if($aksi == "") {
						  include "page/transaksi/transaksi.php";
						}elseif ($aksi=="daftarpengajuanpeminjaman") {
						 include "page/transaksi/daftarpengajuanpeminjaman.php";
						} elseif ($aksi=="tambahpeminjaman") {
						 include "page/transaksi/tambahpeminjaman.php";
						}elseif ($aksi=="kembali") {
						 include "page/transaksi/kembali.php";
						} elseif ($aksi=="perpanjang") {
                         include "page/transaksi/perpanjang.php";
											 } elseif ($aksi=="detail") {
												include "page/transaksi/detail.php";
											 } elseif ($aksi=="detailRiwayat") {
												include "page/transaksi/detailRiwayat.php";
											 }elseif ($aksi=="detailpengajuanmember") {
												include "page/transaksi/detailpengajuanmember.php";
											 }elseif ($aksi=="acc") {
												include "page/transaksi/acc.php";
											 }elseif ($aksi=="tolak") {
												include "page/transaksi/tolak.php";
											 }
                      }
					  elseif ($page == "riwayat") {
                          if($aksi == "") {
                            include "page/riwayat/riwayat.php";
                          }
                      }
					  elseif ($page == "laporan") {
                          if($aksi == "") {
                            include "page/laporan/laporan.php";
                          }
                      }elseif ($page=="") {
                          include "dashboard_admin.php";
                        }

                      ?>



                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />


             <!-- /. PAGE INNER  -->
            </div>

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


	<script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>

<?php
	}else{
		header("location:Home.php");
	}

?>
