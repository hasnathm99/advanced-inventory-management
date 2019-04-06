<?php

require_once('db_connect.php');
$id=$_GET['id'];


	$query="delete from customer where id='$id' ";
	$query_run=mysqli_query($connect , $query);
		if($query_run){
				header("refresh:0;url=../view_customer.php" );
		}else{
				header("refresh:0;url=../view_customer.php" );
		}

?>

