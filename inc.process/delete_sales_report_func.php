<?php

require_once('db_connect.php');
$id=$_GET['id'];

	$query="delete from sales where id='$id' ";
	$query_run=mysqli_query($connect , $query);
		if($query_run){
				header( "refresh:0;url=../sales_report.php" );	
		}else{
			$message="Can Not Delete This Information.Try Again Please..";
			//header( "refresh:0;url=../sales_report.php" );		
		}

?>
<script type="text/javascript">
	var message='<?php echo $message; ?>';
	alert(message);
</script>

