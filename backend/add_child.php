<html>
<head>
  <head>

  <style>

.topnav {
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

</style>

<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8"/>


</head>
<body>

<div class="topnav">
  <a href="home_page.html">Home</a>
  <a class="active" href="child_home.html">Child Details</a>
  <a href="adoption_home.html">Adoption Details</a>
  <a href="transachome.html">Tansactions</a>
   <a href="main_organization.html">Organization</a>
   <a style="font-size:14px;font-style:italic;color:black;">Not all of us can do great things, but we can do small things with great love</a>
 </div>
 


<?php
$servername="localhost";
$username="postgres";
$password="sumSVR@1";


$conn=pg_connect("host=localhost port=5432 dbname=anathashishu user=postgres password=sumSVR@1");

if(!$conn)
	echo "Connection failed to the database";
?>


<html>
<body>

<?php
$id=$_POST["id"];
$name=$_POST["name"];
$gender=$_POST["gender"];
$dob=$_POST["dob"];
$adhaar_id=$_POST["adhaar_id"];
$date_of_joining=$_POST["date_of_joining"];


$query="Insert into Child values('$id','$name','$gender','$dob','$adhaar_id','$date_of_joining')";
// pg_query($conn,$query);
// echo "Successfully added!";


if (pg_send_query($conn, $query)) {
  $res=pg_get_result($conn);
  if ($res) {
    $state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
   		echo $state;
   		if($state==0)
   		{
        ob_start();
   			header('location:show_orphans.php');
        exit();
   		}
   		if($state=="23505")
   		{
   			echo "enter a unique id";
   		}
      }
    }
  


?>

</body>
</html>