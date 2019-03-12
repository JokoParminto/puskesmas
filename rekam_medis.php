<?php
	include("header.php");
	$query="SELECT * FROM obat";
    $dataObat= mysqli_query($db, $query);

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
					<h4 class="card-title">Data Rekam Medis</h4>
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#input" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Tambah Pemeriksaan</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#daftar" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Daftar Pasien Hari Ini</span></a> </li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content tabcontent-border">
						<div class="tab-pane active show" id="input" role="tabpanel">
							<div class="p-20">
								<div class="basic-form">
									<form action="rekam_medis_action.php" method="post" novalidate>
										<input type="hidden" class="form-control" name="id_rekam_medis" id="id_rekam_medis">							
											<div class="form-group">
												<label for="">Pasien</label>
													<select class="form-control" name="id_pasien" required="" id="id_pasien">
														<option value="">Pilih Pasien</option>
															<?php
																$query = ("select * from pasien");
																$connect = mysqli_query($db, $query);
																while ($data = mysqli_fetch_assoc($connect)){
																echo "<option value='{$data['id_pasien']}'>{$data['nama_pasien']}</option>";}?>
													</select>    
											</div>
											<div class="form-group">
												<label for="">Tenaga Medis</label>
													<select class="form-control" name="id_tenaga_medis" required="" id="id_tenaga_medis">
														<option value="">Tenaga Medis</option>
															<?php
																	$query = ("select * from tenaga_medis WHERE jabatan = 'Tenaga Medis'");
																	$connect = mysqli_query($db, $query);
																	while ($data = mysqli_fetch_assoc($connect)){
																	echo "<option value='{$data['id_tenaga_medis']}'>{$data['nama_tenaga_medis']}</option>";}?>
													</select>  
											</div> 
											<div class="form-group">
												<label for="">Diagnosa</label>
													<textarea class="form-control" name="diagnosa" id="diagnosa" rows="15" placeholder="Diagnosa ..." style="height:100px"></textarea>
											</div>
											<div class="form-group">
												<label for="">Status Rujuk</label>
													<select class="form-control" name="status_rujuk" id="status_rujuk">
														<option value="">Pilih Status Rujuk</option>
														<option value="YA">Ya</option>
														<option value="TIDAK">Tidak</option>
													</select>
											</div>
											<div class="form-group">
												<label for="">Status Rawat</label>
													<select class="form-control" name="status_rawat" id="status_rawat">
														<option value="">Pilih Status Rawat</option>
														<option value="rawat-inap">Rawat Inap</option>
														<option value="rawat-jalan">Rawat Jalan</option>
														<option value="rujuk">Rujuk</option>
													</select>
											</div>
											<div class="form-group">
												<label for="">Anamnesa</label>
													<textarea class="form-control" name="anamnesa" id="anamnesa" rows="15" placeholder="Anamnesa ..." style="height:100px"></textarea>
											</div>
											<div class="form-group">
												<label for="">Pemeriksaan Fisik</label>
													<textarea class="form-control" name="pemeriksaan_fisik" id="pemeriksaan_fisik" rows="15" placeholder="Pemeriksaan Fisik ..." style="height:100px"></textarea>
											</div>
											<div class="form-group">
												<label for="">Tindakan</label>
													<textarea class="form-control" name="tindakan" id="tindakan" rows="15" placeholder="Tindakan ..." style="height:100px"></textarea>
											</div>
											<div class="form-group">
												<label for="">Catatan</label>
													<textarea class="form-control" name="catatan" id="catatan" rows="15" placeholder="Catatan ..." style="height:100px"></textarea>
											</div>
											<div class="form-group">									
												<label for="">Obat</label>
													<table class="table">
														<thead>
															<tr>
																<th>#</th>
																<th>Nama Obat</th>
																<th style="width:15%">Banyak</th>
																<th style="width:15%">Aksi</th>
															</tr>
														</thead>
														<tbody id="list_obat">
															<tr style="display:none;" id="example_obat">
																<th class="nomor" scope="row"></th>
																	<td> 
																		<select class="form-control id_obat" name="id_obat[]" required="" id="id_obat">
																			<option value="">Pilih Obat</option>
																			<?php
																				$query = ("select * from obat");
																				$connect = mysqli_query($db, $query);
																				while ($data = mysqli_fetch_assoc($connect)){
																				echo "<option value='{$data['id_obat']}'>{$data['nama_obat']}</option>";}?>
																		</select>
																	</td>
																	<td>
																		<input type="number" class="form-control jumlah_obat" value="1" min="1" id="jumlah_obat" name="jumlah_obat[]">
																	</td>
																	<td class="delete">
																		<button class="hapusIni">
																			<i class="mdi mdi-delete font-18 align-middle mr-2"></i>Hapus															
																		</button>
																	</td>
															</tr>
														</tbody>
													</table>    
													</br>
												<button id="add_obat" class="btn btn-default">Tambah</button>									  
											</div>
										<button type="submit" class="btn btn-default">Simpan</button>         
									</form>
								</div>
							</div>
						</div>
						<div class="tab-pane p-20" id="daftar" role="tabpanel">
							<div class="table-responsive m-t-40">
								<table id="datatable-pemeriksaan" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Nama Pasien</th>
											<th>Tenaga Nedis</th>
											<th>Diagnosa</th>
											<th>Alamat</th>
											<th>Tanggal Daftar</th>
											<th>Tanggal Pengambilan</th>
											<th>Catatan</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$query="
												SELECT 
													rekam_medis.*,
													pasien.*,
													tenaga_medis.*,
													obat.*,
													resep_obat.*
												FROM rekam_medis  
												JOIN pasien  ON pasien.id_pasien = rekam_medis.id_pasien
												JOIN tenaga_medis ON tenaga_medis.id_tenaga_medis = rekam_medis.id_tenaga_medis
												JOIN obat ON obat.id_obat = rekam_medis.id_obat
												LEFT JOIN resep_obat ON resep_obat.id_rekam_medis = rekam_medis.id_rekam_medis
												GROUP BY rekam_medis.tgl_rekam_medis DESC
											";
											$dataPemeriksaan= mysqli_query($db, $query);
											while ($isi = mysqli_fetch_assoc($dataPemeriksaan)) {
													echo "<tr>";
													echo "<th>" . $isi["nama_pasien"]."</th>";
													echo "<th>" . $isi["nama_tenaga_medis"]."</th>";
													echo "<th>" . $isi["diagnosa"]."</th>";
													echo "<th>" . $isi["alamat"].  "</th>";
													echo "<th>" . $isi["tgl_daftar"]."</th>";
													echo "<th>" . $isi["tanggal_pengambilan"]."</th>";
													echo "<th>" . $isi["catatan"]."</th>";
													echo "<th><a href='rekam_medis_detail.php?id_rekam_medis=".$isi['id_rekam_medis']."&id_pasien=".$isi['id_pasien']."'>Detail</a></th>";
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
<script>
	"use strict";
	
	var nomor = 0;
	
	$(function(){
		$('#add_obat').trigger('click');
	});

	$('#id_pasien').change(function (e) { 
		e.preventDefault();
		$('#id_periksa').val($(this).val());
	});

	$('#add_obat').click(function (e) { 
		e.preventDefault();
		var clone = $('#example_obat').clone();
		clone.find('.nomor').text(nomor += 1);
		clone.removeAttr('style').addClass('listObat').appendTo('#list_obat');
	});

	$(document).on("click", ".hapusIni", function(e) { //user click on remove text
        e.preventDefault();
        $(this).parent().parent().remove();
		nomor -= 1;
    })

</script>
</html>