<?php
ob_start();
session_start();
require_once('db_connect.php');
$id=$_GET['id'];
$user_id=$_SESSION['user_id'];

	$query="delete from purchase where id='$id' ";
	$query_run=mysqli_query($connect , $query);
		if($query_run){
				header("refresh:0;url=../purchase_report.php" );
		}else{
				header("refresh:0;url=../purchase_report.php" );
		}

?>

