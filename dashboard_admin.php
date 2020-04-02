											<div class="row">
                     <h2>Admin Dashboard</h2>
                        <h5>Welcome Admin Perpustakakaan SMA PGRI 2 Palembang</h5>
                    </div>
                </div>
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-book fa-2x"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">
											<?php
		 								 $sql = $koneksi->query("SELECT SUM(stok) AS jumlah FROM buku");
		 								 while($data= $sql->fetch_assoc()){
											 echo $data['jumlah'];
										 }
										 ?></p>
                    <p class="text-muted">Data Buku</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-users fa-2x"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">
											<?php
											$cek = mysql_connect("localhost", "root", "") or die (mysql_error());
											mysql_select_db("dbperpus") or die (mysql_error());
											$result = mysql_query("SELECT * FROM user where status='member'");
											$num_rows = mysql_num_rows($result);
											echo $num_rows;
										 ?>
								 </p>
                    <p class="text-muted">Data Anggota</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-shopping-cart fa-2x"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">
											<?php
											$cek = mysql_connect("localhost", "root", "") or die (mysql_error());
											mysql_select_db("dbperpus") or die (mysql_error());
											$result = mysql_query("SELECT * FROM peminjaman where status_peminjaman='pinjam'");
											$num_rows = mysql_num_rows($result);
											echo $num_rows;
										 ?>
										</p>
                    <p class="text-muted">Transaksi</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-history fa-2x"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">
											<?php
											$cek = mysql_connect("localhost", "root", "") or die (mysql_error());
    									mysql_select_db("dbperpus") or die (mysql_error());
											$result = mysql_query("SELECT * FROM peminjaman where status_peminjaman='kembali'");
											$num_rows = mysql_num_rows($result);
											echo $num_rows;
										 ?>
										</p>
                    <p class="text-muted">Riwayat</p>
                </div>
             </div>
		     </div>
			</div>

                 <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">

											<style type="text/css">
											div{
											-moz-border-radius-topleft: 4px; -webkit-border-top-left-radius: 4px; -khtml-border-top-left-radius: 4px; border-top-left-radius: 4px;
											-moz-border-radius-topright: 4px; -webkit-border-top-right-radius: 4px; -khtml-border-top-right-radius: 4px; border-top-right-radius: 4px;
											-moz-border-radius-bottomleft: 4px; -webkit-border-bottom-left-radius: 4px; -khtml-border-bottom-left-radius: 4px; border-bottom-left-radius: 4px;
											-moz-border-radius-bottomright: 4px; -webkit-border-bottom-right-radius: 4px; -khtml-border-bottom-right-radius: 4px; border-bottom-right-radius: 4px;
											}
											body{
											font-family:Arial, Helvetica, sans-serif;
											font-size:11px;
											}
											.hari{
											float:left;
											padding:5px;
											width:40px;
											text-align:center;
											margin:2px;
											background:#0CF;
											background-image:-webkit-linear-gradient(top,#ffffff 0%,#3e9ad2 100%);
											background-image:-moz-linear-gradient(top,#ffffff 0%,#3e9ad2 100%);
											background-image:-o-linear-gradient(top,#ffffff 0%,#3e9ad2 100%);
											background-image:-ms-linear-gradient(top,#ffffff 0%,#3e9ad2 100%);
											background-image:linear-gradient(top,#ffffff 0%,#3e9ad2 100%);
											}
											.tgl{
											float:left;
											padding:5px;
											width:40px;
											text-align:center;
											margin:2px;
											background:#CCC;
											background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), color-stop(25%, #ffffff), to(#e6e6e6));
											background-image: -webkit-linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);
											background-image: -moz-linear-gradient(top, #ffffff, #ffffff 25%, #e6e6e6);
											background-image: -ms-linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);
											background-image: -o-linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);
											background-image: linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);
											}
											.tgl:hover{
											background-image: -khtml-gradient(linear, left top, left bottom, from(#049cdb), to(#0064cd));
											background-image: -moz-linear-gradient(top, #049cdb, #0064cd);
											background-image: -ms-linear-gradient(top, #049cdb, #0064cd);
											background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #049cdb), color-stop(100%, #0064cd));
											background-image: -webkit-linear-gradient(top, #049cdb, #0064cd);
											background-image: -o-linear-gradient(top, #049cdb, #0064cd);
											background-image: linear-gradient(top, #049cdb, #0064cd);
											color:#FFF;
											}
											.float_habis{
											padding:1px;
											text-align:center;
											}
											.tgl_blank{
											float:left;
											padding:5px;
											width:40px;
											text-align:center;
											margin:2px;
											background:#F8F8F8;
											color:#CCC;
											}

											.tgl_skrng{
											float:left;
											padding:5px;
											width:40px;
											text-align:center;
											margin:2px;
											background:#FC0;
											}

											.blokbaris{
											padding:5px;
											text-align:center;
											margin:2px;
											}
											</style>

											<?php
											$now = getdate(time());
											$time = mktime(0,0,0, $now['mon'], 1, $now['year']);
											$date = getdate($time);
											$dayTotal = cal_days_in_month(0, $date['mon'], $date['year']);
											//Print the calendar header with the month name.
											print '<strong>' . $date['month'] . '</strong>';
											print '<div class=blokbaris>';
											$hari=array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
											for ($i = 0; $i < 7; $i++) {
												print "<div class='hari'>$hari[$i]</div>";
											}
											print '<div class=float_habis>&nbsp;</div></div>';

											for ($i = 0; $i < 6; $i++) {
												print '<div class=blokbaris>';
												for ($j = 1; $j <= 7; $j++) {
													$dayNum = $j + $i*7 - $date['wday'];
													//Print a cell with the day number in it.  If it is today, highlight it.
													print '<div';
													if ($dayNum > 0 && $dayNum <= $dayTotal) {
														print ($dayNum == $now['mday']) ? ' class=tgl_skrng>' : ' class=tgl>';
														print "$dayNum";
													}
													else {
														//Print a blank cell if no date falls on that day, but the row is unfinished.
														print ' class=tgl_blank> - ';
													}
													print '</div>';
												}
												print '<div class=float_habis>&nbsp;</div></div>';
												if ($dayNum >= $dayTotal && $i != 6)
												break;
											}
											?>

             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>

<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</body>
</html>
