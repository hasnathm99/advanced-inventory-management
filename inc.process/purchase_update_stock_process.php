<?php
require('db_connect.php');

$user_id=$_SESSION['user_id']; 

$query="select product_name, sum(qty) from purchase group by product_name ";
$query_run=mysqli_query($connect, $query);

while($row=mysqli_fetch_array($query_run)){
    
     $product_name=$row['product_name'];
     $sum_purchase_qty=$row['sum(qty)'].'<br>';

    $query3="select sum(qty) from sales where pro_name='$product_name' ";
    $query3_run=mysqli_query($connect , $query3);

    while ($row2=mysqli_fetch_array($query3_run)) {
        echo $sum_sales_qty=$row2['sum(qty)'].'<br>';
        $update_qty=$sum_purchase_qty - $sum_sales_qty;
        $query2="update product set total_qty =$update_qty where product_name='$product_name' ";
        $quer2_run=mysqli_query($connect , $query2);
    }
}
if($query_run){
        header('Location:../purchase_report.php');
    }else{
        header('Location:../purchase_report_emp.php');
    }
	

?>