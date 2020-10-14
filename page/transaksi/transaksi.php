<div class="row">

                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <Center><b>Daftar Peminjaman</b></Center>
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th>No</th>
                                            <th style="text-align:center;">Id Pinjam</th>
                                            <th style="text-align:center;">NISN</th>
                                            <th style="text-align:center;">Nama</th>
                                            <th style="text-align:center;">Tanggal Pinjam</th>
                                            <th style="text-align:center;">Batas Peminjaman</th>
                                            <th style="text-align:center;">Status</th>
											<th style="text-align:center;">Terlambat</th>
											<th style="text-align:center;">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
									<?php


									$no = 1;
									$sql = $koneksi->query("SELECT * from peminjaman,user where
									peminjaman.id_user = user.id_user and peminjaman.status_peminjaman='pinjam'");
									while($data= $sql->fetch_assoc()){



									?>
									<tr>
									<td style="text-align:center;"><?php echo $no++; ?></td>
									<td style="text-align:center;"><a href = "?page=transaksi
									&aksi=detail&id_pinjam=<?php echo $data['id_pinjam']; ?>
									&judul_buku=<?php echo $data['judul_buku']; ?>"><?php echo $data['id_pinjam'];?></td>
									<td style="text-align:center;"><?php echo $data['username'];?></td>
									<td style="text-align:center;"><?php echo $data['nama'];?></td>
									<td style="text-align:center;"><?php echo $data['tgl_pinjam'];?></td>
									<td style="text-align:center;"><?php echo $data['limit_tanggal'];?></td>
									<td style="text-align:center;"><?php echo $data['status_peminjaman'];?></td>
									<td style="text-align:center;">

									<?php
									$denda = 500;
									$tgl_dateline2 =$data['limit_tanggal'];
									$tgl_kembali = date('Y-m-d');
									$lambat = terlambat($tgl_dateline2, $tgl_kembali);
									$denda1 = $lambat*$denda;

									if($lambat>0){
										echo "
										<font color='red'>$lambat hari<br></font> Rp $denda1
										";
									}else{
										echo $lambat ." Hari";
									}

									?>

									</td>

									<td style="text-align:center;">
									<a href ="?page=transaksi
									&aksi=perpanjang
									&id_pinjam=<?php echo $data['id_pinjam']; ?>
									&judul_buku=<?php echo $data['judul_buku'] ?>
									&lambat=<?php echo $lambat ?>
									&limit_tanggal=<?php echo $data['limit_tanggal'] ?>"
									class= "btn btn-danger"> Perpanjang </a></td>

									</tr>

									<?php
									}
									?>

									</tbody>
									</div>
							</div>
						</div>
				</div>
				<center><a href ="?page=transaksi&aksi=daftarpengajuanpeminjaman" class= "btn btn-primary"> Daftar Pengajuan Peminjam </a> &nbsp&nbsp&nbsp
				<a href ="?page=transaksi&aksi=tambahpeminjaman&judul_buku=<?php echo $data['judul_buku']; ?>"
          <?php session_start();
          unset($_SESSION['tmpbuku']);
          unset($_SESSION['tmpjumlah']);
          unset($_SESSION['tmppeminjam']);
          unset($_SESSION['tmptgl_pinjam']);
          unset($_SESSION['tmplimit_tanggal']); ?> class= "btn btn-success"> + Tambah Peminjaman Buku </a></center>
