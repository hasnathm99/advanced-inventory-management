<?php
require_once('db_connect.php');

if(isset($_POST['submit'])){
	if (isset($_POST['product_name']) and isset($_POST['product_color']) and isset($_POST['product_gsm']) and isset($_POST['unit_price']) and isset($_POST['product_width']) and isset($_POST['product_height'])) {
		$product_name=$_POST['product_name'];
		$product_color=$_POST['product_color'];
		$product_gsm=$_POST['product_gsm'];
		$unit_price=$_POST['unit_price'];
		$product_width=$_POST['product_width'];
		$product_height=$_POST['product_height'];

		$query="insert into product(product_name, product_color, product_gsm, unit_price, product_width, product_height) values('$product_name' , '$product_color' , '$product_gsm' , '$unit_price' , '$product_width' , '$product_height')";
		$query_run=mysqli_query($connect ,$query );
		if($query_run){
			$message="Product Added Successfully";
			header( "refresh:0;url=../view_product.php" );
		}else{
			$message="Can Not Add Product.Try Again...";
			header( "refresh:0;url=../view_product.php" );
		}
	}
}

?>
	<script type="text/javascript">
		var message= '<?php echo $message; ?>';
		alert(message);
	</script>