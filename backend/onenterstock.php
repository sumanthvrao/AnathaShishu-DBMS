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
  <a  href="home_page.html">Home</a>
  <a href="child_home.html">Child Details</a>
  <a href="adoption_home.html">Adoption Details</a>
  <a class="active" href="transachome.html">Tansactions</a>
   <a href="main_organization.html">Organization</a>
   <a style="font-size:14px;font-style:italic;color:black;">Not all of us can do great things, but we can do small things with great love</a>
 </div>
</header>


<?php
$id=$_SESSION["transacid"];

if(isset($_POST['rice']) && $_POST['rice']!=NULL)

  {
        $quan=$_POST['rice'];
        $put="insert into Donation_Kind values('$id','rice',$quan)";
        pg_query($conn,$put);

        $query1="Select quantity from stock where item='rice'";
        $result=pg_query($conn,$query1);
        $row=pg_fetch_row($result);
        $row=$row[0]+$quan;

        $query2="Update stock Set quantity=$row where item='rice'";
        pg_query($conn,$query2);


  }

if(isset($_POST['wheat']) && $_POST['wheat']!=NULL)

  {
        $quan=$_POST['wheat'];
        echo $_POST['wheat'];
       
        $put="insert into Donation_Kind values('$id','wheat',$quan)";
        pg_query($conn,$put);

        $query1="Select quantity from stock where item='wheat'";
        $result=pg_query($conn,$query1);
        $row=pg_fetch_row($result);

        $row=$row[0]+$quan;

        $query2="Update Stock Set quantity=$row where item='wheat'";
        pg_query($conn,$query2);


  }


if(isset($_POST['daal']) && $_POST['daal']!=NULL)

  {
        $quan=$_POST['daal'];
        $put="insert into Donation_Kind values('$id','daal',$quan)";
        pg_query($conn,$put);
        $query1="Select quantity from stock where item='daal'";
        $result=pg_query($conn,$query1);
        $row=pg_fetch_row($result);

        $row=$row[0]+$quan;

        $query2="Update Stock Set quantity=$row where item='daal'";
        pg_query($conn,$query2);


  }

if(isset($_POST['rave']) && $_POST['rave']!=NULL)

  {
        $quan=$_POST['rave'];
        $put="insert into Donation_Kind values('$id','rave',$quan)";
        pg_query($conn,$put);

        $query1="Select quantity from stock where item='rave'";
        $result=pg_query($conn,$query1);
        $row=pg_fetch_row($result);
        $row=$row[0]+$quan;

        $query2="Update stock Set quantity=$row where item='rave'";
        pg_query($conn,$query2);
  }

if(isset($_POST['biscuits']) && $_POST['biscuits']!=NULL)

  {
        $quan=$_POST['biscuits'];
        $put="insert into Donation_Kind values('$id','biscuits',$quan)";
        pg_query($conn,$put);
        $query1="Select quantity from stock where item='biscuits'";
        $result=pg_query($conn,$query1);
        $row=pg_fetch_row($result);

        $row=$row[0]+$quan;

        $query2="Update Stock Set quantity=$row where item='biscuits'";
        pg_query($conn,$query2);


  }

if(isset($_POST['jaggery']) && $_POST['jaggery']!=NULL)

  {
        $quan=$_POST['jaggery'];
        $put="insert into Donation_Kind values('$id','jaggery',$quan)";
        pg_query($conn,$put);
        $query1="Select quantity from stock where item='jaggery'";
        $result=pg_query($conn,$query1);
        $row=pg_fetch_row($result);

        $row=$row[0]+$quan;

        $query2="Update Stock Set quantity=$row where item='jaggery'";
        pg_query($conn,$query2);


  }


if(isset($_POST['salt']) && $_POST['salt']!=NULL)

  {
        $quan=$_POST['salt'];
        $put="insert into Donation_Kind values('$id','salt',$quan)";
        pg_query($conn,$put);
        $query1="Select quantity from stock where item='salt'";
        $result=pg_query($conn,$query1);
        $row=pg_fetch_row($result);

        $row=$row[0]+$quan;

        $query2="Update Stock Set quantity=$row where item='salt'";
        pg_query($conn,$query2);


  }
  
if(isset($_POST['sugar']) && $_POST['sugar']!=NULL)

  {
        $quan=$_POST['sugar'];
        $put="insert into Donation_Kind values('$id','sugar',$quan)";
        pg_query($conn,$put);
        $query1="Select quantity from stock where item='sugar'";
        $result=pg_query($conn,$query1);
        $row=pg_fetch_row($result);

        $row=$row[0]+$quan;

        $query2="Update Stock Set quantity=$row where item='sugar'";
        pg_query($conn,$query2);


  }

if(isset($_POST['raagi']) && $_POST['raagi']!=NULL)

  {
        $quan=$_POST['raagi'];
        $put="insert into Donation_Kind values('$id','raagi',$quan)";
        pg_query($conn,$put);
        $query1="Select quantity from stock where item='raagi'";
        $result=pg_query($conn,$query1);
        $row=pg_fetch_row($result);

        $row=$row[0]+$quan;

        $query2="Update Stock Set quantity=$row where item='raagi'";
        pg_query($conn,$query2);


  }
if(isset($_POST['others']) && $_POST['others']!=NULL)

  {
        $quan=$_POST['others'];
        $put="insert into Donation_Kind values('$id','others',$quan)";
        pg_query($conn,$put);
        $query1="Select quantity from stock where item='others'";
        $result=pg_query($conn,$query1);
        $row=pg_fetch_row($result);

        $row=$row[0]+$quan;

        $query2="Update Stock Set quantity=$row where item='others'";
        pg_query($conn,$query2);


  }
header('location: showalldonars.php');

?>

</body>
</html>