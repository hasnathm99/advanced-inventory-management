<?php
//insert.php;


if(isset($_POST["product_name"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=inventory_management_system", "root", "");

 for($count = 0; $count < count($_POST["product_name"]); $count++)
 {  
  $query = "INSERT INTO purchase 
  (supplier_name, order_date, product_name, qty, unit_type, buy_price) 
  VALUES (:supplier_name, :order_date, :product_name, :qty, :unit_type, :buy_price)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(

   array(
    ':supplier_name'  => $_POST["supplier_name"],
    ':order_date'  => $_POST["order_date"], 
    ':product_name'  => $_POST["product_name"][$count],
    ':qty' => $_POST["qty"][$count], 
    ':unit_type' => $_POST["unit_type"][$count], 
    ':buy_price' => $_POST["buy_price"][$count], 
   )
  );
 }
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'ok';
 }
}
?>