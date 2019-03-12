<?php
include("connection.php"); //Establishing connection with our database
if(empty($_SESSION)){
	header("Location: index.php");
}
?>