<div class="row">
                  <form action="" method="GET" enctype="multipart/form-data">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <Center><b>Daftar Anggota</b></Center>
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th><center>No</center></th>
											<th><center>NISN</center></th>
                                            <th><center>Nama</center></th>
                                            <th><center>JK</center></th>
                                            <th><Center>Foto</Center></th>
											<th><center>Alamat</center></th>
											<th><center>Email</center></th>
                      <th><center>Tahun Masuk Sekolah</center></th>

											<th><center>Aksi</center></th>

                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$no = 1;
									$sql = $koneksi->query("select*from user where status='member'");
									while($data= $sql->fetch_assoc()){



									?>
									<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $data['username'];?></td>
									<td><?php echo $data['nama'];?></td>
									<td><?php echo $data['jk'];?></td>

									<td><Center><?php echo "<img src='gambar/fotouser/".$data['foto']."' width='100px' height='100px'/>"; ?></Center></td>
									<td><?php echo $data['alamat'];?></td>
									<td><?php echo $data['email'];?></td>
                  <td><?php echo $data['tahun_masuk'];?></td>

									<td>
									<center><a href ="?page=anggota&aksi=ubahanggota&username=<?php echo $data['username'];?>" class= "btn btn-info"> Ubah </a>
									<a href ="?page=anggota&aksi=hapusanggota&username=<?php echo $data['username'];?>" class= "btn btn-danger"> Hapus </a></center>
									</td>
									</tr>

									<?php
									}
									?>
									</tbody>
									</div>
							</div>
						</div>
        <center><a href ="?page=anggota&aksi=daftarpengajuancalonanggota" class= "btn btn-primary"> Daftar Pengajuan Calon Anggota </a> </center>
      </div>
