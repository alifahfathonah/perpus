                <div class="row">
                    <!-- Advanced Tables -->

                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <Center><b>DATA BUKU</b></Center>
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th><center>No</center></th>
                                            <th><center>Id Buku</center></th>
                                            <th><center>Judul Buku</center></th>
                                            <th><center>Genre Buku</center></th>
                                            <th><center>Penerbit</center></th>
											<th><center>Tahun Buku</center></th>
                      <th><center>Cover Buku</center></th>
                      <th><center>Sinopsis</center></th>
											<th><center>Lokasi</center></th>
											<th><center>Stok</center></th>
                      <th><center>Sumber Pendanaan</center></th>
                      <th><center>Harga</center></th>
											<th><center>Aksi</center></th>

                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$no = 1;
									$sql = $koneksi->query("select*from buku");
									while($data= $sql->fetch_assoc()){
									?>

									<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $data['id_buku'];?></td>
									<td><?php echo $data['judul_buku'];?></td>
									<td><?php echo $data['genre_buku'];?></td>
									<td><?php echo $data['penerbit'];?></td>
									<td><?php echo $data['tahun_buku'];?></td>
                  <td><Center><?php echo "<img src='gambar/buku/".$data['cover']."' width='100px' height='100px'/>"; ?></Center></td>
                  <td><?php echo $data['sinopsis'];?></td>
									<td><?php echo $data['lokasi'];?></td>
									<td><center><?php echo $data['stok'];?></center></td>
                  <td><center><?php echo $data['sumber'];?></center></td>
                  <td><center><?php echo $data['harga'];?></center></td>
									<td>
									<center><a href ="?page=buku&aksi=ubah&id_buku=<?php echo $data['id_buku'];?>" class= "btn btn-info"> Ubah </a>
									<a href ="?page=buku&aksi=hapus&id_buku=<?php echo $data['id_buku'];?>" class= "btn btn-danger"> Hapus </a></center>
									</td>
									</tr>

									<?php
									}
									?>
									</tbody>
									</div>
							</div>
						</div>
					</div>

				<Center><a href ="?page=buku&aksi=tambahbuku" class= "btn btn-primary"> Tambah Data Buku </a></center>
