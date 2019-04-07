<?php

require_once('db_connect.php');

$id=$_GET['id'];

	$query="delete from users where id='$id' ";
	$query_run=mysqli_query($connect , $query);
		if($query_run){
			$message="Account Deleted Successfully";
			header( "refresh:0;url=../account_setings.php" );
			
		}

?>


