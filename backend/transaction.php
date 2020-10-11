<?php
$servername="localhost";
$username="postgres";
$password="sumSVR@1";
session_start();


$conn=pg_connect("host=localhost port=5432 dbname=anathashishu user=postgres password=sumSVR@1");

if(!$conn)
	echo "Connection failed to the database";
?>


<html>

<head>
  <style>

.topnav {
  position:relative;
  overflow: hidden;
  background-color: #668cff;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #4d4dff;
  color: black;
}

.topnav a.active {
  background-color: #0000e6;
  color: white;
}

.form-style-6{
    font: 95% Arial, Helvetica, sans-serif;
    max-width: 400px;
    margin: 10px auto;
    padding: 16px;
    background: #F7F7F7;
}
.form-style-6 h1{
    background: #43D1AF;
    padding: 20px 0;
    font-size: 140%;
    font-weight: 300;
    text-align: center;
    color: #fff;
    margin: -16px -16px 16px -16px;
}
</style>
</head>
<body>


<header>
<div class="topnav">
  <a class="active" href="home_page.html">Home</a>
  <a href="child_home.html">Child Details</a>
  <a href="adoption_home.html">Adoption Details</a>
  <a href="transachome.html">Tansactions</a>
   <a href="main_organization.html">Organization</a>
   <a style="font-size:14px;font-style:italic;color:black;">Not all of us can do great things, but we can do small things with great love</a>
 </div>
</header>


<?php
$id=$_POST["receipt_no"];
$name=$_POST["name"];
$email=$_POST["email"];
$date=$_POST["date"];
$phno=$_POST["phno"];
$typeof=$_POST["typeof"];
$_SESSION["transacid"]=$id;


$query="Insert into Transaction values('$id','$phno','$name','$email','$date')";
// pg_query($conn,$query);
// echo "Successfully added!";


if (pg_send_query($conn,$query)) {
  $res=pg_get_result($conn);
  if ($res) {
    $state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
   		echo $state;
   		if($state==0)
   		{
   			//echo "success";
        if($typeof=='money')
        {
   			  header('location: formoney.html');
        }
        else
        {
          header('location: forstock.html');
        }


   		}

   		if($state=="23505")
   		{
   			echo "Transaction failed";
   		}
      }
    }
  


?>








</body>
</html>