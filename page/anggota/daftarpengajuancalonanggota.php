<div class="row">
                  <form action="" method="GET" enctype="multipart/form-data">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <Center><b>Daftar Pengajuan Calon Anggota</b></Center>
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                          <th>No</th>
                    											<th>NISN</th>
                                                                <th>Nama</th>
                                                                <th>JK</th>
                                                                <th><Center>Foto</Center></th>
                    											<th>Alamat</th>
                    											<th>Email</th>
                                          <th>Tahun Masuk Sekolah</th>
											<th><center>Aksi</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>

									<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT * from user where status='calonmember'");
                  while($data= $sql->fetch_assoc()){
									?>

									<tr>
                    <td><?php echo $no++; ?></td>
  									<td><?php echo $data['username'];?></td>
  									<td><?php echo $data['nama'];?></td>
  									<td><?php echo $data['jk'];?></td>
  									<td><Center><?php echo "<img src='gambar/fotocalon/".$data['foto']."' width='100px' height='100px'/>"; ?></Center></td>
  									<td><?php echo $data['alamat'];?></td>
  									<td><?php echo $data['email'];?></td>
                    <td><?php echo $data['tahun_masuk'];?></td>
									<td>
									<center><a href ="?page=anggota&aksi=diterima&username=<?php echo $data['username'];?>" class= "btn btn-info"> Diterima </a> &nbsp&nbsp&nbsp&nbsp
									<a href ="?page=anggota&aksi=ditolak&username=<?php echo $data['username'];?>" class= "btn btn-danger"> Ditolak </a></center>
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
