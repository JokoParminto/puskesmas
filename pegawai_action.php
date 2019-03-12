<?php
	include("connection.php");

	$id_tenaga_medis = $_POST['id_tenaga_medis'];
	$nama_tenaga_medis	= $_POST['nama_tenaga_medis'];
	$tanggal_lahir	= $_POST['tanggal_lahir'];
	$jenis_kelamin	= $_POST['jenis_kelamin'];
	$agama	= $_POST['agama'];
	$no_telepon	= $_POST['no_telepon'];
	$pendidikan	= $_POST['pendidikan'];
	$level = $_POST['jabatan'];
	// $id_poli					= $_POST['poli'];
	
	if ($_POST['jabatan'] == 1) {
		$jabatan =  'Tenaga Medis';
	} else if ($_POST['jabatan'] == 2) {
		$jabatan =  'Tenaga Kesehatan';
	}else{
		$jabatan =  'Tenaga Farmasi';
	}
	
	$username = $_POST['user_name'];
	$password = md5($_POST['password']);
	
	$id_tenaga_medis_delete	= isset($_GET['id_tenaga_medis']) ? $_GET['id_tenaga_medis'] : '';
	$nama_tenaga_medis_delete= isset($_GET['nama_tenaga_medis']) ? $_GET['nama_tenaga_medis'] : '';

	$simpan = "true";
	$valid = "";
	$aksi = "";
	
	if ($_POST['id_tenaga_medis'] == '' && $id_tenaga_medis_delete == '') {
		$aksi = "Input";
		$nama_tenaga_medis	= $nama_tenaga_medis;
		$sql = "INSERT INTO tenaga_medis 
				(
					nama_tenaga_medis,
					level,
					jabatan,
					tanggal_lahir,
					jenis_kelamin,
					agama,
					no_telepon,
					user_name,
					pendidikan,
					password
				) VALUES (
					'$nama_tenaga_medis',
					$level,
					'$jabatan',
					'$tanggal_lahir',
					'$jenis_kelamin',
					'$agama',
					$no_telepon,
					'$username',
					'$pendidikan',
					'$password'
					)";
	} else if ($_POST['id_tenaga_medis'] !== ''  && $id_tenaga_medis_delete == '') {
		$aksi = "Update";
		$nama_tenaga_medis = $nama_tenaga_medis;
		$sql = "UPDATE tenaga_medis SET 
					nama_tenaga_medis='$nama_tenaga_medis',
					level=$level,
					jabatan='$jabatan',
					tanggal_lahir='$tanggal_lahir',
					jenis_kelamin='$jenis_kelamin',
					agama='$agama',
					no_telepon=$no_telepon,
					user_name='$username',
					pendidikan='$pendidikan',
					password='$password'
				where id_tenaga_medis='$id_tenaga_medis'";
	}else{
		$aksi = "Delete";
		$nama_tenaga_medis			= $nama_tenaga_medis_delete;
		$sql = "DELETE FROM tenaga_medis where id_tenaga_medis = '$id_tenaga_medis_delete'";
	}
	
	$pegawai = mysqli_query($db, $sql);
	
	if(!$pegawai){
		$simpan = "false";
	}else{
		$simpan = "true";
	}

	if($simpan=="true"){
		mysqli_commit($db);
		$_SESSION['pesan'] = 'Transaksi '.$aksi.' '.$nama_tenaga_medis.' Berhasil Dilakukan';
		header("location: pegawai.php"); 
	}else{
		mysqli_rollback($db);
		$_SESSION['pesan'] = 'Transaksi '.$aksi.' '.$nama_tenaga_medis.' Gagal Dilakukan';
		header("location: pegawai.php"); 
	}
?>