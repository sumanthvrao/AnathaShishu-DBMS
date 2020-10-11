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

 <header>
 <header>
<div class="topnav">
  <a  href="home_page.html">Home</a>
  <a href="child_home.html">Child Details</a>
  <a class="active" href="adoption_home.html">Adoption Details</a>
  <a href="transachome.html">Tansactions</a>
   <a href="main_organization.html">Organization</a>
   <a style="font-size:14px;font-style:italic;color:black;">Not all of us can do great things, but we can do small things with great love</a>
 </div>
</header>

<?php
$orphan_id=$_POST["orphan_id"];
$new_guardian=$_POST["new_guardian"];
$email_id=$_POST["email_id"];
$address=$_POST["address"];
$ph_no=$_POST["ph_no"];
$date_of_adoption=$_POST["date_of_adoption"];
$adhaar_id=$_POST["adhaar_id"];
$pan_no=$_POST["pan_no"];
$income_proof=$_POST["income_proof"];
$photo_obtained=$_POST["photo_obtained"];
$witness=$_POST["witness"];



$query="Insert into Adoption values('$orphan_id','$new_guardian','$email_id','$address','$ph_no','$date_of_adoption')";
$query2="Insert into Adoption_Document_Details values('$orphan_id','$adhaar_id','$pan_no','$income_proof','$photo_obtained','$witness')";
//pg_query($conn,$query);
//pg_query($conn,$query2);

//echo "Successfully added!";


if (pg_send_query($conn, $query)) {
  $res=pg_get_result($conn);
  if ($res) {
    $state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
   		//echo $state;
   		if($state==0)
   		{
   			//echo "success";
   			//header('location: add_orphan.html');
   		}
   		if($state=="23505")
   		{
   			echo "enter a unique child id";
   		}
      if($state="23503")
      {
        echo "enter an exisiting child id";
      }
      }
    }

if (pg_send_query($conn, $query2)) {
  $res=pg_get_result($conn);
  if ($res) {
    $state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
      //echo $state;
      if($state==0)
      {
        ob_start();
        header('location: show_adoptions.php');
        exit();
      }
      if($state=="23505")
      {
        echo "enter a unique document id";
      }
      }
    }
  


?>

</body>
</html>