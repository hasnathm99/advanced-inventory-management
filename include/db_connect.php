<?php
require_once('constants.php');

$connect=mysqli_connect(db_host , db_user , db_pass  , db_name);
if(!$connect){
	echo "...........Connection Error..........." ;
}

?>