<?php
	include("header.php");
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Laporan Pembayaran SPP</title>
</head>
<script>
function myFunction() {
    window.print();
}
</script>
<body>
	<div class="container">

<?php


     include "connect.php";
    
$kelas = $_POST['kelas'];
$periode = $_POST['periode'];
     $query="SELECT nama, kelas, periode, status 
                FROM pembayaran_spp 
                    JOIN siswa USING (nis) 
                    WHERE kelas LIKE '$kelas%'  AND STATUS='belum' AND periode ='$periode'";
  

     $hasil=mysqli_query($connect, $query);
    

                        //<!-- /.panel-heading -->
                       echo  "<div class='panel-body'>";
                         echo "<table width='100%' class='table table-striped'>";
                               echo " <thead>
                                    <tr>
                                        
                                        
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Periode</th>
                                        <th>Status</th>
                                        
                                        
                                    </tr>
                                </thead>";

            while ($data=mysqli_fetch_array($hasil)){


                                echo 
                                "<tbody>
                                   <tr class='odd gradeX'>
                                   
                                   <td>".$data['nama']."</td>
                                   <td>".$data['kelas']."</td>
                                   <td>".$data['periode']."</td>
                                   <td>".$data['status']."</td>
                                   
                                </tbody>";
                                                                                       
                                 
                                 
                                 } 
                            echo "</table>";



                             ?>
   


<button onclick="myFunction()">Print</button>

  
	</div>

</body>
</html>