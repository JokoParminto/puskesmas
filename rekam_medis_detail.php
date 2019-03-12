<?php
	include("header.php");
	$today = date('Y-m-d');
	$id_rekam_medis = isset($_GET['id_rekam_medis']) ? $_GET['id_rekam_medis'] : '';
	// print_r($id_rekam_medis);exit();
	$id_pasien = isset($_GET['id_pasien']) ? $_GET['id_pasien'] : '';
	$query="
		SELECT 
			rekam_medis.*,
			pasien.*,
			tenaga_medis.nama_tenaga_medis,
			Obat.*
		FROM rekam_medis  
		JOIN pasien  ON pasien.id_pasien = rekam_medis.id_pasien
		JOIN tenaga_medis ON tenaga_medis.id_tenaga_medis = rekam_medis.id_tenaga_medis
		JOIN Obat ON Obat.id_obat = rekam_medis.id_obat
		WHERE rekam_medis.id_rekam_medis = ".$id_rekam_medis."";
	$dataPemeriksaan= mysqli_query($db, $query);
	$isi=mysqli_fetch_assoc($dataPemeriksaan);
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
				<div class="card-body" id="cetak">
				<h4 class="card-title">Data Pemeriksaan</h4>
					<div class="col-md-12 col-xs-12"  id="master">
						<div class="row">
							<label class="col-lg-4 col-xs-12 control-label"><b>Nama Pasien</b></label>
							<label class="col-lg-8 col-xs-12 control-label namapasien"><?= $isi['nama_pasien']?></label>
						</div>
						<div class="row">
							<label class="col-lg-4 col-xs-12 control-label"><b>Alamat</b></label>
							<label class="col-lg-8 col-xs-12 control-label namadokter"><?= $isi['alamat']?></label>
						</div>
						<div class="row">
							<label class="col-lg-4 col-xs-12 control-label"><b>Jenis Kelamin</b></label>
							<!-- <?php 
								$data = '';
								if ($isi['jenis_kelamin'] == 'l') {
									$data = 'laki-laki';
								} else if ($isi['jenis_kelamin'] == 'p'){
									$data = 'perempuan';
								} else {
									$data = '-';
								}
							?> -->
							<label class="col-lg-8 col-xs-12 control-label namadokter"><?= $isi['jenis_kelamin']?></label>
						</div>
						<div class="row">
							<label class="col-lg-4 col-xs-12 control-label"><b>Nomor Telepon</b></label>
							<label class="col-lg-8 col-xs-12 control-label namadokter"><?= $isi['no_telepon']?></label>
						</div>
						<div class="row">
							<label class="col-lg-4 col-xs-12 control-label"><b>Tanggal Daftar</b></label>
							<label class="col-lg-8 col-xs-12 control-label namadokter"><?= $isi['tgl_daftar']?></label>
						</div>
						<div class="row">
							<label class="col-lg-4 col-xs-12 control-label"><b>Pekerjaan</b></label>
							<label class="col-lg-8 col-xs-12 control-label namadokter"><?= $isi['pekerjaan']?></label>
						</div>
						<div class="row">
							<label class="col-lg-4 col-xs-12 control-label"><b>Riwayat Alergi</b></label>
							<label class="col-lg-8 col-xs-12 control-label namadokter"><?= $isi['riwayat_alergi']?></label>
						</div>
						<div class="row">
							<label class="col-lg-4 col-xs-12 control-label"><b>Umur</b></label>
							<label class="col-lg-8 col-xs-12 control-label namadokter"><?= $isi['umur']?></label>
						</div>
						<div class="row">
							<label class="col-lg-4 col-xs-12 control-label"><b>Golongan Darah</b></label>
							<label class="col-lg-8 col-xs-12 control-label namadokter"><?= $isi['golongan_darah']?></label>
						</div>
						<div class="row">
							<label class="col-lg-4 col-xs-12 control-label"><b>Riwayat Penyakit Keluarga</b></label>
							<label class="col-lg-8 col-xs-12 control-label namadokter"><?= $isi['penyakit_riwayat_keluarga']?></label>
						</div>
						<div class="row">
							<label class="col-lg-4 col-xs-12 control-label"><b>Diagnosa</b></label>
							<label class="col-lg-8 col-xs-12 control-label resume"><?= $isi['diagnosa']?></label>
						</div>
						<div class="row">
							<label class="col-lg-4 col-xs-12 control-label"><b>Anamnesa</b></label>
							<label class="col-lg-8 col-xs-12 control-label resume"><?= $isi['anamnesa']?></label>
						</div>
						<div class="row">
							<label class="col-lg-4 col-xs-12 control-label"><b>Pemeriksaan Fisik</b></label>
							<label class="col-lg-8 col-xs-12 control-label resume"><?= $isi['pemeriksaan_fisik']?></label>
						</div>
						<div class="row">
							<label class="col-lg-4 col-xs-12 control-label"><b>Tindakan</b></label>
							<label class="col-lg-8 col-xs-12 control-label resume"><?= $isi['tindakan']?></label>
						</div>
						<div class="row">
							<label class="col-lg-4 col-xs-12 control-label"><b>Rujukan</b></label>
							<label class="col-lg-8 col-xs-12 control-label diagnosa"><?= $isi['status_rujuk']?></label>
						</div>
					</div>
					<div class="card-body" id="detail">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama Obat</th>
										<th>Banyak</th>
									</tr>
								</thead>
								<tbody id="dataobat">
								<?php
									$query="
										SELECT 
											obat.*,
											resep_obat.jml_obat
										FROM rekam_medis 
										JOIN obat ON obat.id_obat = rekam_medis.id_obat
										JOIN resep_obat ON resep_obat.id_rekam_medis = rekam_medis.id_rekam_medis
										WHERE rekam_medis.id_pasien = ".$_GET['id_pasien']."";
									$i=1;
									$dataResepDetail= mysqli_query($db, $query);
									while ($isiResepDetail = mysqli_fetch_assoc($dataResepDetail)) {
											echo "<tr>";
											echo "<th>" . $i++.  "</th>";
											echo "<th>" . $isiResepDetail["nama_obat"].  "</th>";
											echo "<th>" . $isiResepDetail["jml_obat"].  "</th>";
											echo "</tr>";
										}
										echo "</table>";
									$db->close();
								?>
								</tbody>
							</table>
						</div>
					</div>
					<button type="submit" class="btn btn-default" onclick="window.history.back();">Kembali</button>
					<button type="submit" class="btn btn-default" onclick="printData();">Cetak</button>
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
<script>
function printData()
{
   var divToPrint=document.getElementById("cetak");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
</script>
<!-- End Wrapper -->
</html>