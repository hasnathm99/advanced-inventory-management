<?php
require_once('db_connect.php');
echo $id=$_GET['id'];

$query="delete from purchase where id='$id' ";
$query_run=mysqli_query($connect , $query);
if($query_run){
	
	header( "refresh:0;url=../purchase_report.php" );
}else{
	
	header( "refresh:0;url=../purchase_report.php" );
}
?>
<script type="text/javascript">
	var message='<?php echo $message ?>';
	alert(message);
</script>