<?php

$db_server = "localhost";
$db_user = "root";
$db_pass ="";
$db_name = "skillprodb";

try{
  $conn = mysqli_connect($db_server,$db_user,$db_pass,$db_name  );
}catch(mysqli_sql_exception){
echo "Could not connected";
}

if($conn){
  // echo "Your are connected"."<br>";
}



?>