<?php
//insert.php;

if(isset($_POST["product_name"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=inventory_management_system", "root", "");

 for($count = 0; $count < count($_POST["product_name"]); $count++)
 {  
  $query = "INSERT INTO sales 
  (company_name, order_date, product_name, ream, unit_price, total) 
  VALUES (:company_name, :order_date, :product_name, :ream, :unit_price, :total)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(

   array(
    ':company_name'  => $_POST["company_name"],
    ':order_date'  => $_POST["order_date"], 
    ':product_name'  => $_POST["product_name"][$count],
    ':ream' => $_POST["ream"][$count], 
    ':unit_price' => $_POST["unit_price"][$count], 
    ':total' => $_POST["total"][$count], 
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