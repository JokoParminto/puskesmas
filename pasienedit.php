<?php
	include("header.php");

	$id_pasien        = isset($_GET['id_pasien']) ? $_GET['id_pasien'] : '';
    $query="SELECT * FROM pasien WHERE id_pasien= '$id_pasien'";
    $hasil= mysqli_query($db, $query);
		$isi = mysqli_fetch_assoc($hasil);
		// print_r($isi['status']);exit();
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
    <div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Data Pasien</h4>
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#input" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Tambah Pasien</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#daftar" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Daftar Pasien</span></a> </li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content tabcontent-border">
						<div class="tab-pane active show" id="input" role="tabpanel">
							<div class="p-20">
								<div class="basic-form">
									<form action="pasien_action.php" method="post">
										<input type="hidden" class="form-control" name="id_pasien" id="id_pasien" value="<?= $isi['id_pasien'];?>">
										<div class="form-group">
											<label for="">Nama Pasien</label>
											<input type="text" class="form-control" name="nama_pasien" placeholder="Nama Pasien" id="nama_pasien" value="<?=$isi['nama_pasien']?>">
										</div>
										<div class="form-group">
											<label for="">Alamat</label>
											<input type="text" name="alamat" class="form-control" cols="30" rows="10" id="alamat" value="<?=$isi['alamat']?>">
										</div>
										<div class="row">
											<div class="col-md-4 form-group">
												<label for="">Jenis Kelamin</label>
												<select class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="<?=$isi['jenis_kelamin']?>">
													<option value="">Pilih Jenis Kelamin</option>
													<option value="laki-laki">Laki-laki</option>
													<option value="perempuan">Perempuan</option>
												</select>
											</div>
											<div class="col-md-4  form-group">
												<label for="">Tanggal Lahir</label>
													<input type="date" class="form-control" name="tanggal_lahir" placeholder="dd/mm/yyyy" id="tanggal_lahir" value="<?=$isi['tanggal_lahir']?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4 form-group">
												<label for="">No Telepon</label>
												<input type="number" class="form-control" name="no_telepon" placeholder="Nomor Telepon" id="no_telepon" value="<?=$isi['no_telepon']?>">
											</div>
											<div class="col-md-4  form-group">
												<label for="">Tanggal Daftar</label>
												<input type="date" class="form-control" name="tgl_daftar" placeholder="dd/mm/yyyy" id="tgl_daftar" value="<?=$isi['tgl_daftar']?>">
											</div>
										</div>
										<div class="form-group">
											<label for="">Pekerjaan</label>
											<input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan Pasien" id="pekerjaan" value="<?=$isi['pekerjaan']?>">
										</div>
										<div class="form-group">
											<label for="">Riwayat Alergi</label>
											<input type="text" class="form-control" name="riwayat_alergi" placeholder="Riwayat Alergi" id="riwayat_alergi" value="<?=$isi['riwayat_alergi']?>">
										</div>
										<div class="form-group">
											<label for="">Umur Pasien</label>
											<input type="number" name="umur" class="form-control" cols="30" rows="10" id="umur" value="<?=$isi['umur']?>"></textarea>
										</div>
										<div class="row">
											<div class="col-md-4 form-group">
												<label for="">Golongan Darah</label>
													<select class="form-control" name="golongan_darah" id="golongan_darah" value="<?=isi['golongan_darah'] ? $isi['golongan_darah'] : ''?>">
														<option value="">Pilih Golongan Darah</option>
														<option value="O">O</option>
														<option value="A">A</option>
														<option value="AB">AB</option>
														<option value="B">B</option>
													</select>
											</div>
											<div class="col-md-4 form-group">
												<label for="">Kepala Keluarga</label>
												<input type="text" class="form-control" name="kepala_keluarga" placeholder="Kepala Keluarga" id="kepala_keluarga" value="<?=$isi['kepala_keluarga']?>">
											</div>
										</div>
										<div class="col-md-4 form-group">
											<label for="">Status</label>
											<select class="form-control" name="status" id="status" value="<?=isi['status'] ? $isi['status'] : ''?>">
												<option value="">Pilih Status</option>
												<option value="BPJS">BPJS</option>
												<option value="ASKES">ASKES</option>
											</select>
										</div>
										<div class="form-group">
											<label for="">Penyakit Riwayat Keluarga</label>
											<input type="text" class="form-control" name="penyakit_riwayat_keluarga" placeholder="Penyakit Riwayat Keluarga" id="penyakit_riwayat_keluarga" value="<?=$isi['penyakit_riwayat_keluarga']?>">
										</div>
										<button type="submit" class="btn btn-default">Submit</button>         
									</form>
								</div>
							</div>
						</div>
						<!-- <div class="tab-pane p-20" id="daftar" role="tabpanel">
							<div class="table-responsive m-t-40">
								<table id="datatable-pasien" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Nama Pasien</th>
											<th>Alamat</th>
											<th>Jenis Kelamin</th>
											<th>Tanggal Lahir</th>
											<th>No Telepon</th>
											<th>Tanggal Daftar</th>
											<th>Pekerjaan</th>
											<th>Riwayat Alergi</th>
											<th>Umur</th>
											<th>Golongan Darah</th>
											<th>Kepala Keluarga</th>
											<th>Status</th>
											<th>Penyakit Riwayat Keluarga</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$query="select * from Pasien ";
											$dataPasien= mysqli_query($db, $query);
											while ($isi = mysqli_fetch_assoc($dataPasien)) {
													echo "<tr>";
													echo "<th>" . $isi["nama_pasien"].  "</th>";
													echo "<th>" . $isi["alamat"].  "</th>";
													echo "<th>" . $isi["jenis_kelamin"].  "</th>";
													echo "<th>" . $isi["tanggal_lahir"].  "</th>";
													echo "<th>" . $isi["no_telepon"].  "</th>";
													echo "<th>" . $isi["tgl_daftar"].  "</th>";
													echo "<th>" . $isi["pekerjaan"].  "</th>";
													echo "<th>" . $isi["riwayat_alergi"].  "</th>";
													echo "<th>" . $isi["umur"].  "</th>";
													echo "<th>" . $isi["golongan_darah"].  "</th>";
													echo "<th>" . $isi["kepala_keluarga"].  "</th>";
													echo "<th>" . $isi["status"].  "</th>";
													echo "<th>" . $isi["penyakit_riwayat_keluarga"].  "</th>";
													echo "<th><a href='pasienedit.php?id_pasien=".$isi['id_pasien']."'>Edit</a> || <a href='pasien_action.php?id_pasien=".$isi['id_pasien']."&nama_pasien=".$isi['nama_pasien']."'>Delete</a></th>";
													echo "</tr>";
												}
												echo "</table>";
											$db->close();
										?>
									</tbody>
								</table>
							</div>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</div>
</div>
<!-- End Page wrapper  -->
</div>
</body>
<!-- End Wrapper -->

</html>