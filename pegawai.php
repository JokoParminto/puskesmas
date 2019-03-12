<?php
	include("header.php");
	$query="SELECT * FROM Poli";
    $dataPoli= mysqli_query($db, $query);

?>
<!-- Container fluid  -->
<div class="container-fluid">
    <?php
        if (!empty($_SESSION['pesan'])) {
            echo "<div class='alert alert-primary alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>×</span></button>";
            echo $_SESSION['pesan'];
            echo "</div>";
        }
        unset($_SESSION['pesan']);
    ?>
    <!-- Start Page Content -->
    <div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Data Tenaga Medis</h4>
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#input" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Tambah Pegawai</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#daftar" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Daftar Pegawai</span></a> </li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content tabcontent-border">
						<div class="tab-pane active show" id="input" role="tabpanel">
							<div class="p-20">
								<div class="basic-form">
									<form action="pegawai_action.php" method="post">
									<input type="hidden" class="form-control" name="id_tenaga_administrasi" id="id_tenaga_administrasi">
										<div class="form-group">
											<label for="">Nama Tenaga Medis</label>
											<input type="text" class="form-control" name="nama_tenaga_medis" placeholder="Nama Tenaga Medis" required="" id="nama_tenaga_medis">
										</div>
										<div class="form-group">
											<label for="">Jabatan</label>
											<select class="form-control" name="jabatan" required="" id="jabatan">
												<option value="">Pilih Jabatan</option>
												<option value="1">Tenaga Medis</option>
											</select>
										</div>
                    <div class="form-group">
											<label for="">Tanggal Lahir</label>
											<input type="date" class="form-control" name="tanggal_lahir" required="" id="tanggal_lahir">
										</div>
                    <div class="col-md-4 form-group">
												<label for="">Jenis Kelamin</label>
												<select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
													<option value="l">Laki-Laki</option>
													<option value="p">Perempuan</option>
												</select>
                    </div>
                    <div class="col-md-4 form-group">
												<label for="">Agama</label>
												<select class="form-control" name="agama" id="agama">
													<option value="islam">Islam</option>
													<option value="protestan">Kristen Protestan</option>
                          <option value="katolik">Kristen Katolik</option>
													<option value="hindu">Hindu</option>
                          <option value="budha">Budha</option>
													<option value="lainnya">Lainnya</option>
												</select>
                    </div>
                    <div class="form-group">
											<label for="">Nomor Telepon</label>
											<input type="number" class="form-control" name="no_telepon" placeholder="Nomor Telepon" required="" id="no_telepon">
										</div>
                    <div class="form-group">
											<label for="">Pendidikan</label>
											<input type="text" class="form-control" name="pendidikan" placeholder="Pendidikan" required="" id="pendidikan">
										</div> 
										<div class="form-group">
											<label for="">Username</label>
											<input type="text" class="form-control" name="user_name" placeholder="Username" required="" id="user_name">
										</div>   
										<div class="form-group">
											<label for="">Password</label>
											<input type="password" class="form-control" name="password" placeholder="Password" required="" id="password">
										</div>                       
										<button type="submit" class="btn btn-default">Submit</button>         
									</form>
								</div>
							</div>
						</div>
						<div class="tab-pane p-20" id="daftar" role="tabpanel">
							<div class="table-responsive m-t-40">
								<table id="datatable-pegawai" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Nama</th>
											<th>Jabatan</th>
											<th>Tanggal Lahir</th>
											<th>Jenis Kelamin</th>
											<th>Agama</th>
											<th>Nomor Telepon</th>
											<th>Pendidikan</th>
											<th>Username</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
                      $query="SELECT * FROM tenaga_medis";
											$dataPegawai= mysqli_query($db, $query);
                      while ($isi = mysqli_fetch_assoc($dataPegawai)) {
                        echo "<tr>";
                        echo "<th>" . $isi["nama_tenaga_medis"].  "</th>";
                        echo "<th>" . $isi["jabatan"].  "</th>";
                        echo "<th>" . $isi["tanggal_lahir"].  "</th>";
                        echo "<th>" . $isi["jenis_kelamin"].  "</th>";
                        echo "<th>" . $isi["agama"].  "</th>";
                        echo "<th>" . $isi["no_telepon"].  "</th>";
                        echo "<th>" . $isi["pendidikan"].  "</th>";
                        echo "<th>" . $isi["user_name"].  "</th>";
                        echo "<th><a href='pegawaiedit.php?id_tenaga_medis=".$isi['id_tenaga_medis']."'>Edit</a> || <a href='pegawai_action.php?id_tenaga_medis=".$isi['id_tenaga_medis']."&nama_tenaga_medis=".$isi['nama_tenaga_medis']."'>Delete</a></th>";
                        echo "</tr>";
                        }
                      echo "</table>";
                      $db->close();
                  ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- End PAge Content -->
</div>
</div>
<!-- End Page wrapper  -->
</div>
</body>
<!-- End Wrapper -->

</html>