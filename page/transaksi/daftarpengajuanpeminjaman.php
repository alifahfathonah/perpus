<div class="row">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <Center><b>Daftar Pengajuan Peminjaman</b></Center>
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th style="text-align:center;">No</th>
                                            <th style="text-align:center;">NISN</th>
                                            <th style="text-align:center;">Nama peminjam</th>
											<th style="text-align:center;">Tanggal Pengajuan</th>


                                        </tr>
                                    </thead>
                                    <tbody>

									<?php
									$tgl_pinjam = date("d-m-Y");
									$no = 1;
									$sql = $koneksi->query("SELECT * from peminjaman,user where
									peminjaman.id_user = user.id_user and peminjaman.status_peminjaman='onProses'");
									while($data= $sql->fetch_assoc()){
									?>

									<tr>
									<td style="text-align:center;"><?php echo $no++; ?></td>
									<td style="text-align:center;"><a href = "?page=transaksi
									&aksi=detailpengajuanmember
									&id_pinjam=<?php echo $data['id_pinjam']; ?>
									&judul_buku=<?php echo $data['judul_buku']; ?>"><?php echo $data['username'];?></td>
									<td style="text-align:center;"><?php echo $data['nama'];?></td>
									<td style="text-align:center;"><?php echo $data['tgl_pinjam'];?></td>

									</tr>
									<?php
									}
									?>
									</tbody>
									</div>
							</div>
						</div>
				</div>
