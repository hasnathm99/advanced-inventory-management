<?php
include_once("include/db_connect.php");
include_once("DBOperation.php");
include_once("manage.php");
if (isset($_POST["getNewOrderItem"])) {
	$obj = new DBOperation();
	$rows = $obj->getAllRecord("product");
	?>
	<tr>
		    <td><b class="number">1</b></td>
		    <td>
		        <select name="pid[]" class="form-control form-control-sm pid" required>
		            <option value="">Choose Product</option>
		            <?php 
		            	foreach ($rows as $row) {
		            		?><option value="<?php echo $row['id']; ?>"><?php echo $row["product_name"]; ?></option><?php
		            	}
		            ?>
		        </select>
		    </td>
		    <!-- <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm tqty"></td>    -->
		    <td><input name="qty[]" type="text" class="form-control form-control-sm qty" required></td>
		    <td><input name="price[]" type="text" class="form-control form-control-sm price" readonly></span>
		    <span><input name="pro_name[]" type="hidden" class="form-control form-control-sm pro_name"></td>
		    <td>TK.<span class="amt">0</span></td>
	</tr>
	<?php
	exit();
}
//Get price and qty of one item
if (isset($_POST["getPriceAndQty"])) {
	$m = new Manage();

	// for($count = 0; $count < count($_POST["pro_name"]); $count++)
	//  {  
	//   $query = "INSERT INTO sales 
	//   (pid, order_date, cust_name, pro_name, qty, price, sub_total, discount, net_total, paid, due) 
	//   VALUES (:pid, :order_date, :cust_name, :pro_name, :qty, :price, :sub_total, :discount, :net_total, :paid, :due)
	//   ";
	//   $statement = $connect->prepare($query);
	//   $statement->execute(

	//    array(
	//     ':pid'  => $pid,
	//     ':order_date'  => $order_date,
	//     ':cust_name'  => $_POST["cust_name"],
	//     ':pro_name'  => $_POST["pro_name"][$count],
	//     ':qty' => $qty, 
	//     ':price' => $price,
	//     ':sub_total' => $_POST["sub_total"][$count], 
	//     ':discount' => $_POST["discount"][$count], 
	//     ':net_total' => $_POST["net_total"][$count], 
	//     ':paid' => $paid, 
	//     ':due' => $due
	     
	//    )
	//   );
	//  }
	//  $result = $statement->fetchAll();

	$result = $m->getSingleRecord("purchase","id",$_POST["id"]);
	echo json_encode($result);
	exit();
}


?>