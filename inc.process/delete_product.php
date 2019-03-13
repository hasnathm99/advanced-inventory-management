<?php
require_once('db_connect.php');
echo $id=$_GET['id'];

$query="delete from product where id='$id' ";
$query_run=mysqli_query($connect , $query);
if($query_run){
	
	header( "refresh:0;url=../view_product.php" );
}else{
	
	header( "refresh:0;url=../view_product.php" );
}
?>
<script type="text/javascript">
	var message='<?php echo $message ?>';
	alert(message);
</script>