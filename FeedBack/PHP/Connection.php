<?php

$user = "root";
$pswd= "";
$dbname ="feedback";
$server="localhost";

$con=mysqli_connect($server,$user,$pswd,$dbname);

if(!$con)
{
	//echo "connection error".mysqli_error();
}
else
{

	//echo "<h1>Connected</h1>";
}

?>