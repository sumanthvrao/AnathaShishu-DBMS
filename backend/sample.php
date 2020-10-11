<?php
$servername="localhost";
$username="postgres";
$password="sumSVR@1";


$conn=pg_connect("host=localhost port=5432 dbname=shrey_univ user=postgres password=sumSVR@1");

if(!$conn)
	echo "Connection success";
$query="SELECT * from advisor";

pg_query($conn,$query);


?>