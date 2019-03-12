<?php
	include("header.php");

	$id_obat        = isset($_GET['id_obat']) ? $_GET['id_obat'] : '';
    $query="SELECT * FROM Obat WHERE id_obat= '$id_obat'";
    $hasil= mysqli_query($db, $query);
    $isi = mysqli_fetch_assoc($hasil);
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
					<h4 class="card-title">Data Obat</h4>
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#input" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Tambah Obat</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#daftar" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Daftar Obat</span></a> </li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content tabcontent-border">
						<div class="tab-pane active show" id="input" role="tabpanel">
							<div class="p-20">
								<div class="basic-form">
									<form action="obat_action.php" method="post">
										<input type="hidden" class="form-control" name="id_obat" id="id_obat" value="<?= $isi['id_obat']?>">
										<div class="form-group">
											<label for="">Nama Obat</label>
											<input type="text" class="form-control" name="nama_obat" placeholder="Nama Obat" required="" id="nama_obat" value="<?= $isi['nama_obat']?>">
										</div>
										<div class="form-group">
											<label for="">Jenis Obat</label>
											<input type="text" class="form-control" name="jenis_obat" placeholder="Jenis Obat" required="" id="jenis_obat" value="<?= $isi['jenis_obat']?>">
										</div>
										<div class="form-group">
											<label for="">Satuan</label>
											<select class="form-control" name="satuan_obat" required="" id="satuan_obat" value="<?=$isi['satuan_obat']?>">
												<option value="">Pilih Satuan</option>
												<option value="kapsul">Kapsul</option>
												<option value="tablet">Tablet</option>
												<option value="lembar">Lembar</option>
												<option value="kaplet">Kaplet</option>
												<option value="pil">pil</option>
												<option value="sirup">Sirup</option>
											</select>
										</div>
										<div class="form-group">
											<label for="">Merk Obat</label>
											<input type="text" class="form-control" name="merk_obat" placeholder="Merk Obat" required="" id="merk_obat" value="<?= $isi['merk_obat']?>">
										</div>
										<div class="form-group">
											<label for="">Tanggal Kadaluarsa Obat</label>
											<input type="date" class="form-control" name="tgl_kadaluarsa" required="" id="tgl_kadaluarsa" value="<?= $isi['tgl_kadaluarsa']?>">
										</div>
										
										<button type="submit" class="btn btn-default">Submit</button>         
									</form>
								</div>
							</div>
						</div>
						<div class="tab-pane p-20" id="daftar" role="tabpanel">
							<div class="table-responsive m-t-40">
								<table id="datatable-obat" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Name Obat</th>
											<th>Jenis Obat</th>
											<th>Merk Obat</th>
											<th>Tgl Kadaluarsa</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$query="select * from obat ";
											$dataObat= mysqli_query($db, $query);
											while ($isi = mysqli_fetch_assoc($dataObat)) {
													echo "<tr>";
													echo "<th>" . $isi["nama_obat"].  "</th>";
													echo "<th>" . $isi["jenis_obat"].  "</th>";
													echo "<th>" . $isi["merk_obat"].  "</th>";
													echo "<th>" . $isi["tgl_kadaluwarsa"].  "</th>";
													echo "<th><a href='obatedit.php?id_obat=".$isi['id_obat']."'>Edit</a> || <a href='obat_action.php?id_obat=".$isi['id_obat']."&nama_obat=".$isi['nama_obat']."'>Delete</a></th>";
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
</div>

</div>
</div>
<!-- End Page wrapper  -->
</div>
</body>
<!-- End Wrapper -->

</html>