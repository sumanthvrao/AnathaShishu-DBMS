
<?php
$servername="localhost";
$username="postgres";
$password="sumSVR@1";

$conn=pg_connect("host=localhost port=5432 dbname=anathashishu user=postgres password=sumSVR@1");

if(!$conn)
	echo "Connection failed to the database";
?>


<html>
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
</head>
<body>

  <header>
<div class="topnav">
  <a  href="home_page.html">Home</a>
  <a href="child_home.html">Child Details</a>
  <a href="adoption_home.html">Adoption Details</a>
  <a href="transachome.html">Tansactions</a>
   <a class="active" href="main_organization.html">Organization</a>
   <a style="font-size:14px;font-style:italic;color:black;">Not all of us can do great things, but we can do small things with great love</a>
 </div>
</header>

<?php
$name=$_POST["name"];
$item=$_POST["item"];
$date=$_POST["date"];
$quan=$_POST["quantity"];


$query="Insert into organization values('$name','$item','$date','$quan')";
//pg_query($conn,$query);
// echo "Successfully added!";
if (pg_send_query($conn, $query)) {
  $res=pg_get_result($conn);
  if ($res) {
    $state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
      echo $state;
      if($state==0)
      {
        if($item=="rice")
  {
        $query1="Select quantity from stock where item='rice'";
        $result=pg_query($conn,$query1);
        $row=pg_fetch_row($result);

        $row=$row[0]-$quan;

        $query2="Update Stock Set quantity=$row where item='rice'";
        pg_query($conn,$query2);
  }

  if($item=="wheat")
  {
        $query1="Select quantity from stock where item='wheat'";
        $result=pg_query($conn,$query1);
        $row=pg_fetch_row($result);

        $row=$row[0]-$quan;

        $query2="Update Stock Set quantity=$row where item='wheat'";
        pg_query($conn,$query2);
  }
  if($item=="daal")
  {
        $query1="Select quantity from stock where item='daal'";
        $result=pg_query($conn,$query1);
        $row=pg_fetch_row($result);

        $row=$row[0]-$quan;

        $query2="Update Stock Set quantity=$row where item='daal'";
        pg_query($conn,$query2);
  }
    if($item=="biscuits")
  {
        $query1="Select quantity from stock where item='biscuits'";
        $result=pg_query($conn,$query1);
        $row=pg_fetch_row($result);

        $row=$row[0]-$quan;

        $query2="Update Stock Set quantity=$row where item='biscuits'";
        pg_query($conn,$query2);
  }

   if($item=="jaggery")
  {
        $query1="Select quantity from stock where item='jaggery'";
        $result=pg_query($conn,$query1);
        $row=pg_fetch_row($result);

        $row=$row[0]-$quan;

        $query2="Update Stock Set quantity=$row where item='jaggery'";
        pg_query($conn,$query2);
  }

   if($item=="salt")
  {
        $query1="Select quantity from stock where item='salt'";
        $result=pg_query($conn,$query1);
        $row=pg_fetch_row($result);

        $row=$row[0]-$quan;

        $query2="Update Stock Set quantity=$row where item='salt'";
        pg_query($conn,$query2);
  }

   if($item=="sugar")
  {
        $query1="Select quantity from stock where item='sugar'";
        $result=pg_query($conn,$query1);
        $row=pg_fetch_row($result);

        $row=$row[0]-$quan;

        $query2="Update Stock Set quantity=$row where item='sugar'";
        pg_query($conn,$query2);
  }

   if($item=="raagi")
  {
        $query1="Select quantity from stock where item='raagi'";
        $result=pg_query($conn,$query1);
        $row=pg_fetch_row($result);

        $row=$row[0]-$quan;

        $query2="Update Stock Set quantity=$row where item='raagi'";
        pg_query($conn,$query2);
  }


  if($item=="others")
  {
        $query1="Select quantity from stock where item='rice'";
        $result=pg_query($conn,$query1);
        $row=pg_fetch_row($result);

        $row=$row[0]-$quan;

        $query2="Update Stock Set quantity=$row where item='rice'";
        pg_query($conn,$query2);
  }


header('location: showstocks.php');


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