<html>
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
$b_id=$_POST["b_id"];
$ph_no=$_POST["ph_no"];
$email_id=$_POST["email_id"];
$type=$_POST["type"];
$address=$_POST["address"];



$query="Insert into Child_Background_Details values('$b_id','$ph_no','$email_id','$type','$address')";
//pg_query($conn,$query);
//echo "Successfully added!";


if (pg_send_query($conn, $query)) {
  $res=pg_get_result($conn);
  if ($res) {
    $state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
   		echo $state;
   		if($state==0)
   		{
   			ob_start();
        header('location:show_background_details.php');
        exit();
   		}
   		if($state=="23505")
      {
        echo "enter a unique id";
      }
      if($state="23503")
      {
        echo "enter an exisiting id";
      }
      }
    }
  


?>

</body>
</html>