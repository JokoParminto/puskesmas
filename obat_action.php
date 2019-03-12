<?php
	include("connection.php");

	$id_obat = $_POST['id_obat'];
	$nama_obat = $_POST['nama_obat'];
	$jenis_obat = $_POST['jenis_obat'];
	$satuan_obat = $_POST['satuan_obat'];
	$merk_obat = $_POST['merk_obat'];
	$tgl_kadaluarsa	= $_POST['tgl_kadaluarsa'];
	
	$id_obat_delete		= isset($_GET['id_obat']) ? $_GET['id_obat'] : '';
	$nama_obat_delete	= isset($_GET['nama_obat']) ? $_GET['nama_obat'] : '';

	$simpan = "true";
	$valid = "";
	$aksi = "";

	if ($_POST['id_obat'] == '' && $id_obat_delete == '') {
		$aksi = "Input";
		$nama_obat = $nama_obat;
		$sql = "INSERT INTO obat 
				(
					nama_obat,
					jenis_obat,
					merk_obat,
					satuan_obat,
					tgl_kadaluarsa
				) VALUES (
					'$nama_obat',
					'$jenis_obat',
					'$merk_obat',
					'$satuan_obat',
					'$tgl_kadaluarsa'
					)";
	} else if ($_POST['id_obat'] !== '' && $id_obat_delete == '') {
		$aksi = "Update";
		$nama_obat = $nama_obat;
		$sql = "UPDATE obat SET 
					nama_obat='$nama_obat',
					jenis_obat='$jenis_obat',
					merk_obat='$merk_obat',
					satuan_obat='$satuan_obat',
					tgl_kadaluarsa='$tgl_kadaluarsa'
				where id_obat='$id_obat'";
	}else{
		$aksi = "Delete";
		$nama_obat = $nama_obat;
		$sql = "DELETE FROM obat where id_obat = '$id_obat_delete'";
	}

	$obat = mysqli_query($db, $sql);
	
	if(!$obat){
		$simpan = "false";
	}else{
		$simpan = "true";
	}

	if($simpan=="true"){
		mysqli_commit($db);
		$_SESSION['pesan'] = 'Proses '.$aksi.' '.$nama_obat.' Berhasil Dilakukan';
		header("location: obat.php"); 
	}else{
		mysqli_rollback($db);
		$_SESSION['pesan'] = 'Proses '.$aksi.' '.$nama_obat.' Gagal Dilakukan';
		header("location: obat.php"); 
	}
?>