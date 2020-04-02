<?php

session_start();
$koneksi = new mysqli("localhost", "root", "", "dbperpus");
	if($_SESSION['member']){
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
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
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
								<a class="navbar-side" href="admin.php">  <div> <img  src="assets/img/haianggota.png"  width="100%"/></div> </a>
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <a href="logout.php" class="btn btn-primary square-btn-adjust">Logout</a> </div>
        </nav>
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
									<li class="text-center"><br>
									<?php $sql2 = $koneksi->query("SELECT * from user where status ='member' and id_user='".$_SESSION['member']."' order by id_user asc ");
									$data2= $sql2->fetch_assoc();
									?>
					                    <?php echo "<img src='gambar/fotouser/".$data2['foto']."' width='150px' height='150px' />"; ?>
										<br>
										<br>
										</li>


					<li><b>
							 <div> <img  src="assets/img/menuanggota.png"  width="100%"/> </div>
					</b></li>

					<li>
                        <a  href="?page=buku"><i class="fa fa-book fa-2x"></i> Daftar Buku</a>
                    </li>
					<li>
                        <a  href="?page=pinjamMember"><i class="fa fa-shopping-cart fa-2x"></i> Pinjam Buku</a>
                    </li>
					<li>
					               <a  href="?page=transaksi"><i class="fa fa-history fa-2x"></i> Transaksi</a>
					          </li>
                        </ul>
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
                          include "page/buku/bukuMember.php";
                        }
                      }elseif ($page == "transaksi") {
                          if($aksi == "") {
                            include "page/transaksi/transaksiMember.php";
                          }
                      }elseif ($page == "pinjamMember") {
                          if($aksi == "") {
                            include "page/transaksi/pinjamMember.php";
                          }
                      }elseif ($page=="") {
                          include "page/buku/bukuMember.php";
                        }


                      ?>


                </div>
                 <!-- /. ROW  -->
                 <hr />

    </div>
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

<?php
	}else{
		header("location:Home.php");
	}

?>
