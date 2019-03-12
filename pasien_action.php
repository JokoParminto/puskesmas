<?php
	include("connection.php");

	$id_pasien = $_POST['id_pasien'];
	$nama_pasien = $_POST['nama_pasien'];
	$alamat = $_POST['alamat'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$no_telepon = $_POST['no_telepon'];
	$tgl_daftar = $_POST['tgl_daftar'];
	$pekerjaan = $_POST['pekerjaan'];
	$riwayat_alergi = $_POST['riwayat_alergi'];
	$umur = $_POST['umur'];
	$golongan_darah = $_POST['golongan_darah'];
	$kepala_keluarga = $_POST['kepala_keluarga'];
	$status = $_POST['status'];
	$penyakit_riwayat_keluarga = $_POST['penyakit_riwayat_keluarga'];
	
	$id_pasien_delete	= isset($_GET['id_pasien']) ? $_GET['id_pasien'] : '';
	$nama_pasien_delete	= isset($_GET['nama_pasien']) ? $_GET['nama_pasien'] : '';
	$today = date('Y-m-d');

	$simpan 			= "true";
	$valid 				= "";
	$aksi				= "";

	if ($_POST['id_pasien'] == '' && $id_pasien_delete == '') {
		$aksi			= "Input";
		$nama_pasien	= $nama_pasien;
		$sql = "INSERT INTO pasien 
				(
					nama_pasien,
					alamat,
					jenis_kelamin,
					tanggal_lahir,
					no_telepon,
					tgl_daftar,
					pekerjaan,
					riwayat_alergi,
					umur,
					golongan_darah,
					kepala_keluarga,
					status,
					penyakit_riwayat_keluarga
				) VALUES (
					'$nama_pasien',
					'$alamat',
					'$jenis_kelamin',
					'$tanggal_lahir',
					'$no_telepon',
					'$tgl_daftar',
					'$pekerjaan',
					'$riwayat_alergi',
					$umur,
					'$golongan_darah',
					'$kepala_keluarga',
					'$status',
					'$penyakit_riwayat_keluarga'
					)";
	} else if ($_POST['id_pasien'] !== '' && $id_pasien_delete == '') {
		$aksi = "Update";
		$nama_pasien = $nama_pasien;
		$sql = "UPDATE pasien SET 
					nama_pasien='$nama_pasien',
					alamat='$alamat',
					jenis_kelamin='$jenis_kelamin',
					tanggal_lahir='$tanggal_lahir',
					no_telepon='$no_telepon',
					tgl_daftar='$tgl_daftar',
					pekerjaan='$pekerjaan',
					riwayat_alergi='$riwayat_alergi',
					umur=$umur,
					golongan_darah='$golongan_darah',
					kepala_keluarga='$kepala_keluarga',
					status='$status',
					penyakit_riwayat_keluarga='$penyakit_riwayat_keluarga'
				where id_pasien='$id_pasien'";
	} else {
		$aksi = "Delete";
		$nama_pasien = $nama_pasien_delete;
		$sql = "DELETE FROM pasien where id_pasien = '$id_pasien_delete'";
	}
	
	$pasien = mysqli_query($db, $sql);
	
	if(!$pasien){
		$simpan = "false";
	}else{
		$simpan = "true";
	}

	if($simpan=="true"){
		mysqli_commit($db);
		$_SESSION['pesan'] = 'Proses '.$aksi.' '.$nama_pasien.' Berhasil Dilakukan';
		header("location: pasien.php"); 
	}else{
		mysqli_rollback($db);
		$_SESSION['pesan'] = 'Proses '.$aksi.' '.$nama_pasien.' Gagal Dilakukan';
		header("location: pasien.php"); 
	}
?>