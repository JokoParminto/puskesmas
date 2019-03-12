<?php
	include("header.php");
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
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Laporan</h4>
            <!-- Nav tabs --> 
        </div>
        <div class="">
					<ul class="nav nav-tabs tabs-vertical" role="tablist">
						<li class="nav-item"> <a class="nav-link <?= isset($_GET['typelaporan']) ? '' : 'active show' ?>" data-toggle="tab" href="#daftarpasien" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Laporan Daftar pasien</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tenagaMedis" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Laporan Tenaga Medis</span></a> </li>
            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#obat" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Laporan Daftar obat</span></a> </li>
            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#pemeriksaan" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Laporan Rekam Medis</span></a> </li>
            <li class="nav-item"> <a class="nav-link <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'rawat-jalan'? 'active show' : '' ?>" data-toggle="tab" href="#rawatjalan" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Laporan Rawat Jalan Perperiode</span></a> </li>
            <li class="nav-item"> <a class="nav-link <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'rawat-inap'? 'active show' : '' ?>" data-toggle="tab" href="#laporanrawatinap" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Laporan Rawat Inap Perperiode</span></a> </li>
            <li class="nav-item"> <a class="nav-link <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'jumlah-pasien'? 'active show' : '' ?>" data-toggle="tab" href="#laporanjumlahpasien" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Laporan Jumlah pasien Berdasarkan Umur</span></a> </li>
						<li class="nav-item"> <a class="nav-link <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'jumlah-pasien-kelamin'? 'active show' : '' ?>" data-toggle="tab" href="#laporanjumlahpasienkelamin" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Laporan Jumlah pasien Berdasarkan Jenis Kelamin</span></a> </li>							            
						<li class="nav-item"> <a class="nav-link <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'jumlah-obat'? 'active show' : '' ?>" data-toggle="tab" href="#laporanjumlahobat" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Laporan Penggunaan obat Perperiode</span></a> </li>
            <!-- <li class="nav-item"> <a class="nav-link <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'kode-pasien'? 'active show' : '' ?>" data-toggle="tab" href="#laporankodepasien" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Laporan Perkode pasien</span></a> </li> -->
          </ul>
					<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane <?= isset($_GET['typelaporan']) ? '' : 'active show' ?>" id="daftarpasien" role="tabpanel">
						<div class="p-20">
							<div class="table-responsive">
								<table id="datatable-daftarpasien" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Nama pasien</th>
											<th>Alamat</th>
											<th>Jenis kelamin</th>
											<th>Tanggal Lahir</th>
											<th>Nomor Telepon</th>
											<th>Tanggal Dafatar</th>
											<th>Pekerjaan</th>
											<th>Riwayat Alergi</th>
											<th>Umur</th>
											<th>Golongan Darah</th>
											<th>Kepala Keluarga</th>
											<th>Status</th>
											<th>Riwayat Penyakit Keluarga</th>
										</tr>
									</thead>
									<tbody>
									<?php
											$query="
												SELECT * 
												from pasien
												ORDER BY id_pasien ASC
											";
											$datapasien= mysqli_query($db, $query);
											while ($isi = mysqli_fetch_assoc($datapasien)) {
													echo "<tr>";
													echo "<th>" . $isi["nama_pasien"].  "</th>";
													echo "<th>" . ($isi["alamat"]) ."</th>";												
													echo "<th>" . $isi["jenis_kelamin"].  "</th>";
													echo "<th>" . $isi["tanggal_lahir"].  "</th>";
													echo "<th>" . $isi["no_telepon"] ."</th>";
													echo "<th>" . $isi["tgl_daftar"].  "</th>";
													echo "<th>" . ($isi["pekerjaan"]) ."</th>";												
													echo "<th>" . $isi["riwayat_alergi"].  "</th>";
													echo "<th>" . $isi["umur"].  "</th>";
													echo "<th>" . $isi["golongan_darah"].  "</th>";
													echo "<th>" . $isi["kepala_keluarga"] ."</th>";
													echo "<th>" . $isi["status"] ."</th>";
													echo "<th>" . $isi["penyakit_riwayat_keluarga"] ."</th>";
													echo "</tr>";
												}
												echo "</table>";
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="tab-pane p-20" id="tenagaMedis" role="tabpanel">
						<div class="table-responsive">
							<table id="datatable-tenagaMedis" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Nama Tenaga Medis</th>
										<th>Jabatan</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$query="
											SELECT * 
											from Tenaga_Medis
											ORDER BY id_tenaga_medis ASC
										";
										$datapasien= mysqli_query($db, $query);
										while ($isi = mysqli_fetch_assoc($datapasien)) {
												echo "<tr>";
												echo "<th>" . $isi["nama_tenaga_medis"].  "</th>";
												echo "<th>" . $isi["jabatan"] ."</th>";
												echo "</tr>";
											}
											echo "</table>";
									?>
									</tbody>
							</table>
						</div>
					</div>
					<div class="tab-pane p-20" id="obat" role="tabpanel">
						<div class="table-responsive">
							<table id="datatable-obat" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Nama obat</th>
										<th>Jenis obat</th>
										<th>Merk obat</th>
										<th>Tanggal Kadaluarsa</th>
										<th>Satuan obat</th>
									</tr>
								</thead>
								<tbody>
									<?php
											$query="
												SELECT * 
												FROM obat
												ORDER BY id_obat ASC
											";
											$dataobat= mysqli_query($db, $query);
											while ($isi = mysqli_fetch_assoc($dataobat)) {
															echo "<tr>";
															echo "<th>" . $isi["nama_obat"].  "</th>";
															echo "<th>" . $isi["jenis_obat"].  "</th>";
															echo "<th>" . $isi["merk_obat"].  "</th>";
															echo "<th>" . $isi["tgl_kadaluarsa"].  "</th>";
															echo "<th>" . $isi["satuan_obat"].  "</th>";
															echo "</tr>";
													}
													echo "</table>";
									?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="tab-pane p-20" id="pemeriksaan" role="tabpanel">
						<div class="table-responsive">
							<table id="datatable-obat" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Nama pasien</th>
										<th>Tenaga Medis</th>
										<th>Diagnosa</th>
										<th>Alamat</th>
										<th>Tanggal Daftar</th>
										<th>Tanggal Pengambilan</th>
										<th>Catatan</th>
									</tr>
								</thead>
								<tbody>
									<?php
											$query="
												SELECT 
													rekam_medis.*,
													pasien.*,
													Tenaga_Medis.*,
													obat.*,
													resep_obat.*
												FROM rekam_medis  
												JOIN pasien  ON pasien.id_pasien = rekam_medis.id_pasien
												JOIN Tenaga_Medis ON Tenaga_Medis.id_tenaga_medis = rekam_medis.id_tenaga_medis
												JOIN obat ON obat.id_obat = rekam_medis.id_obat
												LEFT JOIN resep_obat ON resep_obat.id_rekam_medis = rekam_medis.id_rekam_medis
												GROUP BY rekam_medis.tgl_rekam_medis DESC
											";
											$dataobat= mysqli_query($db, $query);
											while ($isi = mysqli_fetch_assoc($dataobat)) {
												echo "<tr>";
												echo "<th>" . $isi["nama_pasien"]."</th>";
												echo "<th>" . $isi["nama_tenaga_medis"]."</th>";
												echo "<th>" . $isi["diagnosa"]."</th>";
												echo "<th>" . $isi["alamat"].  "</th>";
												echo "<th>" . $isi["tgl_daftar"]."</th>";
												echo "<th>" . $isi["tanggal_pengambilan"]."</th>";
												echo "<th>" . $isi["catatan"]."</th>";
												echo "</tr>";
											}
											echo "</table>";
									?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="tab-pane p-20 <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'rawat-jalan' ? 'active show' : '' ?>" id="rawatjalan" role="tabpanel">
						<div class="col-md-4 form-group">
							<label for="">Tanggal Periksa</label>
								<input type="month" class="form-control" name="tgl_periksa" placeholder="mm/yyyy" id="tgl-periksa" value="<?=isset($_GET['startdate']) ? $_GET['startdate'] : ''?>">
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input class="btn btn-primary" type="button" value="submit" id="reloadlaporan" data-laporan="rawat-jalan"/>
									<button type="reset" class="btn btn-primary">reset</button>
							</div>
						</div>
						<div class="table-responsive">
							<table id="datatable-rawatjalan" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Nama pasien</th>
										<th>Nama Tenaga Medis</th>
										<th>Diagnosa</th>
										<th>Status Periksa</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$typelaporan = isset($_GET['typelaporan']) ? $_GET['typelaporan'] : '';
										$startdate = isset($_GET['startdate']) ? $_GET['startdate'] : '';
										$parsing = substr($startdate, 5,2);
										$query="
												SELECT 
												rekam_medis.*,
												pasien.*,
												Tenaga_Medis.*
											FROM  rekam_medis
											JOIN pasien ON pasien.id_pasien = rekam_medis.id_pasien
											JOIN Tenaga_Medis ON Tenaga_Medis.id_tenaga_medis = rekam_medis.id_tenaga_medis
											WHERE MONTH(rekam_medis.tgl_rekam_medis) = '$parsing'
											AND rekam_medis.status_rawat = 'rawat-jalan'
											GROUP BY rekam_medis.id_pasien 
										";
										$dataPerPenyakit= mysqli_query($db, $query);

										while ($isi = mysqli_fetch_assoc($dataPerPenyakit)) {
												echo "<tr>";
												echo "<th>" . $isi["nama_pasien"].  "</th>";
												echo "<th>" . $isi["nama_tenaga_medis"].  "</th>";
												echo "<th>" . $isi["diagnosa"].  "</th>";
												echo "<th>" . $isi["status_rawat"].  "</th>";
												echo "</tr>";
											}
											echo "</table>";
									?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="tab-pane p-20 <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'rawat-inap' ? 'active show' : '' ?>" id="laporanrawatinap" role="tabpanel">
						<div class="col-md-4 form-group">
							<label for="">Tanggal Periksa</label>
								<input type="month" class="form-control" name="tgl_periksa" placeholder="dd/mm/yyyy" id="tgl" value="<?=isset($_GET['startdate']) ? $_GET['startdate'] : ''?>">
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input class="btn btn-primary" type="button" value="submit" id="reloadlaporaninap" data="rawat-inap"/>
									<button type="reset" class="btn btn-primary">reset</button>
							</div>
						</div>
						<div class="table-responsive">
							<table id="datatable-rawatjalan" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Nama pasien</th>
										<th>Nama Tenaga Medis</th>
										<th>Diagnosa</th>
										<th>Status Periksa</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$typelaporan = isset($_GET['typelaporan']) ? $_GET['typelaporan'] : '';
										$startdate = isset($_GET['startdate']) ? $_GET['startdate'] : '';
										$parsing = substr($startdate, 5,2);
										$query="
											SELECT *
											FROM  Tenaga_Medis
											JOIN pasien ON pasien.id_pasien = rekam_medis.id_pasien
											JOIN Tenaga_Medis ON Tenaga_Medis.id_tenaga_medis = rekam_medis.id_tenaga_medis
											WHERE MONTH(rekam_medis.tgl_rekam_medis) = '$parsing'
											AND rekam_medis.status_rawat = 'rawat-inap'
											GROUP BY rekam_medis.id_pasien 
										";
										$dataPerPenyakit= mysqli_query($db, $query);

										while ($isi = mysqli_fetch_assoc($dataPerPenyakit)) {
												echo "<tr>";
												echo "<th>" . $isi["nama_pasien"].  "</th>";
												echo "<th>" . $isi["nama_tenaga_medis"].  "</th>";
												echo "<th>" . $isi["diagnosa"].  "</th>";
												echo "<th>" . $isi["status_rawat"].  "</th>";
												echo "</tr>";
											}
											echo "</table>";
									?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="tab-pane p-20 <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'jumlah-pasien' ? 'active show' : '' ?>" id="laporanjumlahpasien" role="tabpanel">
						<div class="row">
							<div class="col-md-4 form-group">
								<label for="">Jenjang Usia</label>
								<select class="form-control" name="jenis_kelamin" id="umur" value="<?=isset($_GET['umur']) ? $_GET['umur'] : ''?>" >
									<option value="">==================</option>
									<option value="anak">Anak-anak</option>
									<option value="remaja">Remaja</option>
									<option value="dewasa">Dewasa</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input class="btn btn-primary" type="button" value="submit" id="reloadlaporanumur" data="jumlah-pasien"/>
									<button type="reset" class="btn btn-primary">reset</button>
							</div>
						</div>
						<div class="table-responsive">
							<table id="datatable-laporanjumlahpasien" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Banyak pasien</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$typelaporan = isset($_GET['typelaporan']) ? $_GET['typelaporan'] : '';
										$umur = isset($_GET['umur']) ? $_GET['umur'] : '';
										$sql = '';
										if (!empty($umur)) {
											if ($umur == "anak") {
											$sql = "AND pasien.umur BETWEEN 1 AND 12";
											} else if ($umur == "remaja") {
												$sql = "AND pasien.umur BETWEEN 13 AND 21";
											} else {
												$sql = "AND pasien.umur BETWEEN 22 AND 100";
											}
										} else {
											$sql = '';
										} 
										$query="
											SELECT 
												COUNT(DISTINCT rekam_medis.id_pasien) as total
											FROM  rekam_medis
											JOIN pasien ON pasien.id_pasien = rekam_medis.id_pasien
											WHERE 0 = 0
											$sql 
										";
										// print_r($query);die();
										$dataPerAlamat= mysqli_query($db, $query);
										while ($isi = mysqli_fetch_assoc($dataPerAlamat)) {
												echo "<tr>";
												echo "<th>" . $isi["total"].  "</th>";
												echo "</tr>";
											}
											echo "</table>";
									?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="tab-pane p-20 <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'jumlah-pasien-kelamin' ? 'active show' : '' ?>" id="laporanjumlahpasienkelamin" role="tabpanel">
						<div class="row">
							<div class="col-md-4 form-group">
								<label for="">Jenis Kelamin</label>
								<select class="form-control" name="jenis_kelamin" id="jeniskelamin" value="<?=isset($_GET['jeniskelamin']) ? $_GET['jeniskelamin'] : ''?>" >
									<option value="">==================</option>
									<option value="laki-laki">Laki-laki</option>
									<option value="perempuan">Perempuan</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input class="btn btn-primary" type="button" value="submit" id="reloadlaporankelamin" data="jumlah-pasien-kelamin"/>
									<button type="reset" class="btn btn-primary">reset</button>
							</div>
						</div>
						<div class="table-responsive">
							<table id="datatable-laporanjumlahpasien" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Banyak pasien</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$typelaporan = isset($_GET['typelaporan']) ? $_GET['typelaporan'] : '';
										$jk = isset($_GET['jeniskelamin']) ? $_GET['jeniskelamin'] : '';
										$query="
											SELECT 
												COUNT(DISTINCT rekam_medis.id_pasien) as total
											FROM  rekam_medis
											JOIN pasien ON pasien.id_pasien = rekam_medis.id_pasien
											WHERE 0 = 0
											AND pasien.jenis_kelamin = '$jk'
										";
										$dataPerAlamat= mysqli_query($db, $query);
										while ($isi = mysqli_fetch_assoc($dataPerAlamat)) {
												echo "<tr>";
												echo "<th>" . $isi["total"].  "</th>";
												echo "</tr>";
											}
											echo "</table>";
									?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="tab-pane p-20 <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'jumlah-obat' ? 'active show' : '' ?>" id="laporanjumlahobat" role="tabpanel">
						<div class="col-md-4 form-group">
							<label for="">Periode</label>
								<input type="month" class="form-control" name="tgl_obat" placeholder="dd/mm/yyyy" id="tgl-obat" value="<?=isset($_GET['tglobat']) ? $_GET['tglobat'] : ''?>">
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input class="btn btn-primary" type="button" value="submit" id="reloadlaporanobat" data="jumlah-obat"/>
									<button type="reset" class="btn btn-primary">reset</button>
							</div>
						</div>
						<div class="table-responsive">
							<table id="datatable-laporanjumlahobat" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama obat</th>
										<th>Jumlah obat</th>
										<th>Tanggal Periksa</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$startdate = isset($_GET['tglobat']) ? $_GET['tglobat'] : '';
										$parsing = substr($startdate, 5,2);
										$query="
											SELECT 
												rekam_medis.*,
												obat.*,
												resep_obat.*
											FROM  rekam_medis
											JOIN obat ON obat.id_obat = rekam_medis.id_obat
											LEFT JOIN resep_obat ON resep_obat.id_rekam_medis = rekam_medis.id_rekam_medis
											WHERE MONTH(rekam_medis.tgl_rekam_medis) = '$parsing'
											GROUP BY rekam_medis.id_rekam_medis 
										";
										$dataPerUmur= mysqli_query($db, $query);
										while ($isi = mysqli_fetch_assoc($dataPerUmur)) {
												echo "<tr>";
												echo "<th>" . $isi["id_resep"].  "</th>";
												echo "<th>" . $isi["nama_obat"].  "</th>";
												echo "<th>" . $isi["jml_obat"].  "</th>";
												echo "<th>" . $isi["tgl_rekam_medis"].  "</th>";
												echo "</tr>";
											}
											echo "</table>";
									?>
								</tbody>
							</table>
						</div>
					</div>
					<!-- <div class="tab-pane p-20 <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'kode-pasien' ? 'active show' : '' ?>" id="laporankodepasien" role="tabpanel">
						<div class="row">
							<div class="col-md-4 form-group">
								<label for="">pasien</label>
								<select class="form-control" name="id-pasien" id="id-pasien"  value="<?=isset($_GET['idpasien']) ? $_GET['idpasien'] : ''?>" >
									<option value="">==================</option>
										<?php
											$query = ("select * from pasien");
											$connect = mysqli_query($db, $query);
											while ($data = mysqli_fetch_assoc($connect)){
											echo "<option value='{$data['id_pasien']}'>{$data['nama_pasien']}-{$data['id_pasien']}</option>";}?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input class="btn btn-primary" type="button" value="submit" id="reloadlaporankode" data="kode-pasien"/>
									<button type="reset" class="btn btn-primary">reset</button>
							</div>
						</div>
						<div class="table-responsive">
							<table id="datatable-laporanjumlahpasien" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
										<tr>
											<th>Nama pasien</th>
											<th>Tenaga Medis</th>
											<th>Diagnosa</th>
											<th>Alamat</th>
											<th>Tanggal Daftar</th>
											<th>Tanggal Pengambilan</th>
											<th>Catatan</th>
										</tr>
								</thead>
								<tbody>
									<?php
										$id_pasien = isset($_GET['idpasien']) ? $_GET['idpasien'] : '';
										// print_r($id_pasien);exit();
											$query="
												SELECT 
													rekam_medis.*,
													pasien.*,
													Tenaga_Medis.*,
													obat.*,
													resep_obat.*
												FROM rekam_medis  
												JOIN pasien  ON pasien.id_pasien = rekam_medis.id_pasien
												JOIN Tenaga_Medis ON Tenaga_Medis.id_tenaga_medis = rekam_medis.id_tenaga_medis
												JOIN obat ON obat.id_obat = rekam_medis.id_obat
												LEFT JOIN resep_obat ON resep_obat.id_rekam_medis = rekam_medis.id_rekam_medis
												WHERE rekam_medis.id_pasien = '$id_pasien'
												GROUP BY rekam_medis.id_pasien ASC
											";
											$datapasien= mysqli_query($db, $query);
											while ($isi = mysqli_fetch_assoc($datapasien)) {
													echo "<tr>";
													echo "<th>" . $isi["nama_pasien"]."</th>";
													echo "<th>" . $isi["nama_tenaga_medis"]."</th>";
													echo "<th>" . $isi["diagnosa"]."</th>";
													echo "<th>" . $isi["alamat"].  "</th>";
													echo "<th>" . $isi["tgl_daftar"]."</th>";
													echo "<th>" . $isi["tanggal_pengambilan"]."</th>";
													echo "<th>" . $isi["catatan"]."</th>";
													echo "</tr>";
												}
												echo "</table>";
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
<!-- End Page wrapper  -->
</div>
</body>
<!-- End Wrapper -->
<script>
$(document).ready(function() {
	$('.table').DataTable({
		'dom': 'Bfrtip',
		'buttons': ['copy', 'csv', 'excel', 'pdf', 'print']
		});
	});
	$('#reloadlaporan').on('click', function(){
		console.log('a');
		window.location.href = 'laporan_tenaga_medis.php?typelaporan='+$(this).attr('data-laporan')+'&startdate='+$('#tgl-periksa').val();
	});
	$('#reloadlaporaninap').on('click', function(){
		console.log('a');
		window.location.href = 'laporan_tenaga_medis.php?typelaporan='+$(this).attr('data')+'&startdate='+$('#tgl').val();
	});
	$('#reloadlaporanumur').on('click', function(){
		console.log('a');
		window.location.href = 'laporan_tenaga_medis.php?typelaporan='+$(this).attr('data')+'&umur='+$('#umur').val();
	});
	$('#reloadlaporankelamin').on('click', function(){
		console.log('a');
		window.location.href = 'laporan_tenaga_medis.php?typelaporan='+$(this).attr('data')+'&jeniskelamin='+$('#jeniskelamin').val();
	});
	$('#reloadlaporanobat').on('click', function(){
		console.log('a');
		window.location.href = 'laporan_tenaga_medis.php?typelaporan='+$(this).attr('data')+'&tglobat='+$('#tgl-obat').val();
	});
	$('#reloadlaporanpenyakit').on('click', function(){
		// console.log('laporan_tenaga_medis.php?typelaporan='+$(this).attr('data')+'&penyakit='+$('#diagnosa')+'&tglawal='+$('#tgl-awal')+'&tglakhir='+$('#tgl-akhir').val());
		window.location.href = 'laporan_tenaga_medis.php?typelaporan='+$(this).attr('data')+'&diagnosa='+$('#diagnosa').val()+'&tglawal='+$('#tgl-awal').val()+'&tglakhir='+$('#tgl-akhir').val();
	});
	$('#reloadlaporankode').on('click', function(){
		// console.log('laporan_tenaga_medis.php?typelaporan='+$(this).attr('data')+'&penyakit='+$('#diagnosa')+'&tglawal='+$('#tgl-awal')+'&tglakhir='+$('#tgl-akhir').val());
		window.location.href = 'laporan_tenaga_medis.php?typelaporan='+$(this).attr('data')+'&idpasien='+$('#id-pasien').val();
	});
</script>
</html>
