<?php
	include("connection.php");

	$id_rekam_medis = $_POST['id_rekam_medis'];
	$id_pasien = $_POST['id_pasien'];
	$id_obat = $_POST['id_obat'];
	$id_tenaga_medis = $_POST['id_tenaga_medis'];
	$diagnosa = $_POST['diagnosa'];
	$status_rujuk = $_POST['status_rujuk'];
	$status_rawat = $_POST['status_rawat'];
	$anamnesa = $_POST['anamnesa'];
	$catatan = $_POST['catatan'];
	$pemeriksaan_fisik = $_POST['pemeriksaan_fisik'];
	$tindakan = $_POST['tindakan'];
	$resep_obat = $_POST['resep_obat'];
	$jumlah_obat = $_POST['jumlah_obat'];
	$tgl_periksa = $_POST['tgl_periksa'];
	
	$query="SELECT nama_pasien FROM pasien WHERE id_pasien= '$id_pasien'";
	$hasil= mysqli_query($db, $query);
	$nama_pasien = mysqli_fetch_assoc($hasil); 
	$nama_pasien = $nama_pasien['nama_pasien'];
	$today = '';
	$tgl_rekam_medis = date('Y-m-d h:i:s');
	if ($status_rujuk == 'YA') {
		$today = '0000-00-00';
	} else {
		$today = date('Y-m-d');
	}

	$todayResep = '';
	$tgl_rekam_medis = date('Y-m-d');
	if ($status_rujuk == 'YA') {
		$todayResep = '0000-00-00';
	} else {
		$todayResep = date('Y-m-d');
	}

	foreach ($id_obat as $key => $value) {
		if ($id_obat[$key] !== '') {
			$sql = "INSERT INTO rekam_medis
			(
				id_pasien,
				id_obat,
				id_tenaga_medis,
				diagnosa,
				status_rujuk,
				status_rawat,
				anamnesa,
				pemeriksaan_fisik,
				tindakan,
				tgl_rekam_medis
			) VALUES (
				$id_pasien,
				$id_obat[$key],
				$id_tenaga_medis,
				'$diagnosa',
				'$status_rujuk',
				'$status_rawat',
				'$anamnesa',
				'$pemeriksaan_fisik',
				'$tindakan',
				'$tgl_rekam_medis'
				)";
			$pemeriksaan = mysqli_query($db, $sql);
			$latest_id_pemeriksaan = $db->insert_id;
			$status_pengambilan = 0;
			if ($status_rujuk == 'YA') {
				$status_pengambilan = 0;
			}
			if ($status_rujuk == 'TIDAK') {
				$status_pengambilan = 1;
			}
			if ($latest_id_pemeriksaan) {
			$sql = "INSERT INTO resep_obat 
				(
					id_rekam_medis,
					id_obat,
					jml_obat,
					status_pengambilan,
					tanggal_pengambilan,
					catatan
				) VALUES (
					$latest_id_pemeriksaan,
					$id_obat[$key],
					$jumlah_obat[$key],
					$status_pengambilan,
					'$todayResep',
					'$catatan'
				)"; 
				$resep = mysqli_query($db, $sql);
				$latest_id_resep = $db->insert_id;   
			}  
		}	
	}
	
	if(!$pemeriksaan){
		$simpan = "false";
	}else{
		$simpan = "true";
	}

	if($simpan=="true"){
		mysqli_commit($db);
		$_SESSION['pesan'] = 'Transaksi '.$aksi.' '.$nama_pasien.' Berhasil Dilakukan';
		header("location: rekam_medis.php"); 
	}else{
		mysqli_rollback($db);
		$_SESSION['pesan'] = 'Transaksi '.$aksi.' '.$nama_pasien.' Gagal Dilakukan';
		header("location: rekam_medis.php"); 
	}
?>