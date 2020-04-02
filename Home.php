<?php
error_reporting(0);
ob_start();
session_start();
$koneksi = new mysqli("localhost", "root", "", "dbperpus");

	if($_SESSION['admin'] || $_SESSION['admin']){
		header("location: Admin.php");
	}if($_SESSION['member'] || $_SESSION['member']){
		header("location: Anggota.php");
	}else{
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

  <!-- /. NAV SIDE  -->
            <div id="page-inner">
                <div class="row">

                      <h2><center></Center></h2>
                         <div class="row">

                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

                        <div class="panel panel-default">

                            <div class="panel-body">
								<img  src="assets/img/pgri.jpg"  width="100%"/>
                                <form role="form"  method="POST">

                                  <br/>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input type="text" id="username" name="username" class="form-control" placeholder="Id user" required/>
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required/>
                                        </div>

                                     <input type="submit" id="btn" name ="login" class="btn btn-success  " value="Login"/>


                                    <hr />
                                   Belum Punya Akun? <a  href="Register.php">Daftar sekarang</a>
                                    </form>
                            </div>
                        </div>
                    </div>

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
    <script src="assets/js/custom.js"></script>



</body>
</html>

<?php
	if(isset($_POST['login'])){
		echo$username = $_POST['username'];
		echo$pass = $_POST['pass'];
		$pass = md5($pass);

		$sql = $koneksi->query("select * from user where username='$username' and pass = '$pass'");

		$data = $sql->fetch_assoc();

		$ketemu = $sql->num_rows;

		if($ketemu>=1){
			session_start();

			if($data['status'] == "admin"){
			$_SESSION['admin'] = $data['id_user'];
			header("location:Admin.php");
			}
			else if($data['status'] == "member"){
			$_SESSION['member'] = $data['id_user'];
			header("location:Anggota.php");
			}
		}else{
			?>
			<script type ="text/javascript">
			alert("Login gagal, Id user dan password salah !")
			</script>
			<?php
		}
	}

	}
	?>
