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
                                            <th style="text-align:center;">Tanggal Kembali</th>
                                            <th style="text-align:center;">Batas Peminjaman</th>
                                            <th style="text-align:center;">Status</th>
											<th style="text-align:center;">Terlambat</th>
											<th style="text-align:center;">Denda</th>

                                        </tr>
                                    </thead>
                                    <tbody>
									<?php


									$no = 1;
									$sql = $koneksi->query("SELECT * from peminjaman,user, buku, detail_peminjaman
									where peminjaman.id_user = user.id_user
									and detail_peminjaman.id_pinjam = peminjaman.id_pinjam
									and detail_peminjaman.id_buku = buku.id_buku
									and peminjaman.status_peminjaman='kembali'");
									while($data= $sql->fetch_assoc()){



									?>
									<tr>
									<td style="text-align:center;"><?php echo $no++; ?></td>
									<td style="text-align:center;"><a href = "?page=transaksi
									&aksi=detailRiwayat&id_pinjam=<?php echo $data['id_pinjam']; ?>
									&judul_buku=<?php echo $data['judul_buku']; ?>"><?php echo $data['id_pinjam'];?></td>
									<td style="text-align:center;"><?php echo $data['username'];?></td>
									<td style="text-align:center;"><?php echo $data['nama'];?></td>
									<td style="text-align:center;"><?php echo $data['tgl_pinjam'];?></td>
									<td style="text-align:center;"><?php echo $data['tgl_kembali'];?></td>
									<td style="text-align:center;"><?php echo $data['limit_tanggal'];?></td>
									<td style="text-align:center;"><?php echo $data['status_peminjaman'];?></td>
									<td style="text-align:center;"><?php echo $data['terlambat'];?></td>
									<td style="text-align:center;"><?php echo $data['denda'];?></td>

									</tr>

									<?php
									}
									?>

									</tbody>
									</div>
							</div>
						</div>
				</div>
