<div class="row">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <Center><b>PEMINJAMAN BUKU</b></Center>
                        </div>

                        <div class="panel-body">
						Ayo Kembalikan Buku Tepat Waktu
						<a href="./laporan/cetak_bukti_pembayaran.php" class="btn btn-defult" target = "blank"><i class = "fa fa-print"></i> Cetak Bukti Peminjaman Buku</a></center>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover"  id="dataTables-example">
                                    <thead>
                                        <tr>
											<th style="text-align:center;">No</th>
											<th style="text-align:center;" width="85px">Id Pinjam</th>
                                            <th style="text-align:center;">Judul Buku</th>
											<th style="text-align:center;">Tanggal Pinjam</th>
											<th style="text-align:center;">Tanggal Batas Pembayaran</th>
                                            <th style="text-align:center;">Tanggal kembali</th>
											<th style="text-align:center;">Status</th>
											<th style="text-align:center;">Terlambat</th>
											<th style="text-align:center;">Denda</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$no = 1;

									$sql = $koneksi->query("SELECT * from detail_peminjaman, peminjaman, buku where
									detail_peminjaman.id_buku = buku.id_buku and detail_peminjaman.id_pinjam =
									peminjaman.id_pinjam and peminjaman.id_user = '".$_SESSION['member']."' ");
									while($data= $sql->fetch_assoc()){

									?>
									<tr>
									<td style="text-align:center;"><?php echo $no++; ?></td>
									<td style="text-align:center;"><?php echo $data['id_pinjam']; ?></td>
									<td style="text-align:center;"><?php echo $data['judul_buku']; ?></td>
									<td style="text-align:center;"><?php echo $data['tgl_pinjam']; ?></td>
									<td style="text-align:center;"><?php echo $data['limit_tanggal']; ?></td>
									<td style="text-align:center;"><?php echo $data['tgl_kembali']; ?></td>
									<td style="text-align:center;"><?php echo $data['status_peminjaman']; ?></td>
									<td style="text-align:center;"><?php echo $data['terlambat']; ?></td>
									<td style="text-align:center;"><?php echo $data['denda']; ?></td>
									</tr>

									<?php
									}
									?>
									</tbody>
									</div>
							</div>

						</div>
          </div>
