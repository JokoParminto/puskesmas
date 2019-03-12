<?php
	include("header.php");
?>
<?php
	include("fusion.php");
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
          <h4 class="card-title">Grafik</h4>
          <!-- Nav tabs -->
          
      </div>
      <div class="">
        <ul class="nav nav-tabs tabs-vertical" role="tablist">
          <li class="nav-item"> <a class="nav-link <?= isset($_GET['typelaporan']) ? '' : 'active show' ?>" data-toggle="tab" href="#list" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Daftar Laporan Grafik</span></a> </li>
          <li class="nav-item"> <a class="nav-link <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'data-penyakit'? 'active show' : '' ?>" data-toggle="tab" href="#penyakit" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Grafik Penyakit Perperiode</span></a> </li>
          <li class="nav-item"> <a class="nav-link <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'data-perpenyakit'? 'active show' : '' ?>" data-toggle="tab" href="#perpenyakit" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Grafik Perpenyakit Perperiode</span></a> </li>
        </ul>
        <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane <?= isset($_GET['typelaporan']) ? '' : 'active show' ?>" id="list" role="tabpanel">
					<p>
          <h4 class="card-title">Grafik Penyakit Perperiode</h4>
          <h4 class="card-title">Grafik Perpenyakit</h4>
          </p>
        </div>
        <div class="tab-pane p-20 <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'data-penyakit' ? 'active show' : '' ?>" id="penyakit" role="tabpanel">
            <div class="col-md-4 form-group">
              <label for="">Tanggal Periksa</label>
              <input type="month" class="form-control" name="tgl_penyakit" placeholder="dd/mm/yyyy" id="tgl_penyakit" value="<?=isset($_GET['startdate']) ? $_GET['startdate'] : ''?>">
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input class="btn btn-primary" type="button" value="submit" id="reloadlaporanpenyakit" data="data-penyakit"/>
                  <button type="reset" class="btn btn-primary">reset</button>
              </div>
            </div class="table-responsive" >
              <?php
                $startdate = isset($_GET['startdate']) ? $_GET['startdate'] : '';
                $parsing = substr($startdate, 5,2);
                $strQuery = "
                  SELECT diagnosa,
                        COUNT(diagnosa) as total
                  FROM rekam_medis
                  WHERE MONTH(tgl_rekam_medis) = '$parsing'
                  GROUP BY diagnosa
                ";
                $result = mysqli_query($db, $strQuery);
                if ($result) {
                $arrData = array(
                  "chart" => array(
                      "caption"=>"Grafik Penyakit Perperiode",
                      "subcaption"=> "Periode Bulanan",
                      "yaxismaxvalue"=> "100",
                      "decimals"=> "0",
                      "numbersuffix"=> "orang",
                      "placevaluesinside"=> "1",
                      "rotatevalues"=> "0",
                      "divlinealpha"=> "50",
                      "plotfillalpha"=> "80",
                      "drawCrossLine"=> "1",
                      "crossLineColor"=> "#00b7cc",
                      "crossLineAlpha"=> "100",
                      "theme"=> "zune"
                      )
                    );
                    $categoryArray=array();
                    $dataseries1=array();
                    while($row = mysqli_fetch_array($result)) {
                    array_push($categoryArray, array(
                      "label" => $row['diagnosa']));
                      array_push($dataseries1, array(
                      "value" => $row['total']));
                    }
                  $arrData["categories"]=array(array("category"=>$categoryArray));
                  $arrData["dataset"] = array(array("seriesName"=> "total", "data"=>$dataseries1));
                  $jsonEncodedData = json_encode($arrData);
                  $msChart = new FusionCharts("mscombi2d", "chart1" , "750", "400", "chart-container", "json", $jsonEncodedData);
                  $msChart->render();
                }
              ?>
              <center>
                <div id="chart-container">
                </div>
            </center>
        </div>
        <div class="tab-pane p-20 <?= isset($_GET['typelaporan']) && $_GET['typelaporan'] == 'data-perpenyakit' ? 'active show' : '' ?>" id="perpenyakit" role="tabpanel">
            <div class="col-md-4 form-group">
                <label for="">Tenaga Medis</label>
                  <select class="form-control" name="diagnosa" required="" id="diagnosa" >
                    <option value=""><?= isset($_GET['diagnosa']) && $_GET['diagnosa'] ? $_GET['diagnosa'] : '====Pilih Penyakit====' ?></option>
                      <?php
                        $query = ("select * from rekam_medis");
                        $connect = mysqli_query($db, $query);
                        while ($data = mysqli_fetch_assoc($connect)){
                        echo "<option value='{$data['diagnosa']}'>{$data['diagnosa']}</option>";}?>
                  </select>  
              </div> 
            <div class="col-md-4 form-group">
              <label for="">Tanggal Periksa</label>
              <input type="month" class="form-control" name="tgl_perpenyakit" placeholder="dd/mm/yyyy" id="tgl_perpenyakit" value="<?=isset($_GET['startdate']) ? $_GET['startdate'] : ''?>">
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input class="btn btn-primary" type="button" value="submit" id="reloadlaporanperpenyakit" data="data-perpenyakit"/>
                  <button type="reset" class="btn btn-primary">reset</button>
              </div>
            </div class="table-responsive" >
              <?php
                $startdate = isset($_GET['startdate']) ? $_GET['startdate'] : '';
                $diagnosa = isset($_GET['diagnosa']) ? $_GET['diagnosa'] : '';
                $parsing = substr($startdate, 5,2);
                $strQuery = "
                  SELECT diagnosa,
                        COUNT(diagnosa) as total
                  FROM rekam_medis
                  WHERE MONTH(tgl_rekam_medis) = '$parsing'
                  AND diagnosa = '$diagnosa'
                  GROUP BY diagnosa
                ";
                $result = mysqli_query($db, $strQuery);
                if ($result) {
                $arrData = array(
                  "chart" => array(
                  "caption"=>"Grafik PerPenyakit Perperiode",
                  "subcaption"=> "Periode Bulanan",
                  "yaxismaxvalue"=> "100",
                  "decimals"=> "0",
                  "numbersuffix"=> "orang",
                  "placevaluesinside"=> "1",
                  "rotatevalues"=> "0",
                  "divlinealpha"=> "50",
                  "plotfillalpha"=> "80",
                  "drawCrossLine"=> "1",
                  "crossLineColor"=> "#00b7cc",
                  "crossLineAlpha"=> "100",
                  "theme"=> "zune"
                  ));
                  $categoryArray=array();
                  $dataseries1=array();
                  while($row = mysqli_fetch_array($result)) {
                  array_push($categoryArray, array(
                    "label" => $row['diagnosa']));
                    array_push($dataseries1, array(
                    "value" => $row['total']));
                  }
                  $arrData["categories"]=array(array("category"=>$categoryArray));
                  $arrData["dataset"] = array(array("seriesName"=> "total", "data"=>$dataseries1));
                  $jsonEncodedData = json_encode($arrData);
                  $msChart = new FusionCharts("mscombi2d", "chart2" , "750", "400", "chart-container-new", "json", $jsonEncodedData);
                  $msChart->render();
                }
              ?>
              <center>
                <div id="chart-container-new">
                </div>
            </center>
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
<script src="chart/js/fusioncharts.js"></script>
<script src="chart/js/themes/fusioncharts.theme.fint.js"></script>
<script>
$(document).ready(function() {
	$('.table').DataTable({
		'dom': 'Bfrtip',
		'buttons': ['copy', 'csv', 'excel', 'pdf', 'print']
		});
	});
	$('#reloadlaporanpenyakit').on('click', function(){
		console.log('a');
		window.location.href = 'chart.php?typelaporan='+$(this).attr('data')+'&startdate='+$('#tgl_penyakit').val();
	});
  $('#reloadlaporanperpenyakit').on('click', function(){
		console.log('a');
		window.location.href = 'chart.php?typelaporan='+$(this).attr('data')+'&diagnosa='+$('#diagnosa').val()+'&startdate='+$('#tgl_perpenyakit').val();
	});
</script>
</html>
