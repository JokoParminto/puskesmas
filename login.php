<?php
	include("connection.php");
	$error = "";
	if(isset($_POST))
	{
		if(empty($_POST["username"]) || empty($_POST["password"]))
		{
			$error = "Silahkan isi terlebih dahulu.";
		}else
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysqli_real_escape_string($db, $username);
			$password = mysqli_real_escape_string($db, $password);
			$password = md5($password);
			$result = 0;
			if ($username == 'kepala') {
				$sql="SELECT * FROM tenaga_medis WHERE user_name='$username' and password='$password'";
				$result=mysqli_query($db,$sql);
				$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			} else {
				$sql="SELECT * FROM tenaga_medis WHERE user_name='$username' and password='$password'";
				$result=mysqli_query($db,$sql);
				$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			}

			if (mysqli_num_rows($result) == 1 || mysqli_num_rows($result) == 0) {
				$_SESSION['is_logged_in'] = 1;
				$_SESSION['user_id'] =  $row['id_tenaga_medis'];
				$_SESSION['user_jabatan'] = $row['jabatan'];
				$_SESSION['user_name'] = $row['user_name'];
				$_SESSION['level'] = $row['level'];
				if (empty($_SESSION['user_id'])) {
					header("location: index.php");
				} else {
					header("location: home.php");
				}
			} else {
				$error = "Incorrect username or password.";
				header("location: index.php");				
			}
		}
	} else {
		$_SESSION ;
	}
?>