<HTML>
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
<body>
<meta name="viewport" content="width=device-width,user-scalable=yes"/>
<?php $name=$_POST["name"]; ?>

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

<h3 align="center"> Detail's about <?php echo $name; ?> Organization</h3>

<center>
	<table width="500" cellpadding="5" cellspacing="1"></center> 
	<tr>
  
		<th style="background-color:orange;">Name</th>
		<th style="background-color:orange;">Item</th>
        <th style="background-color:orange;">Date</th>
        <th style="background-color:orange;">quantity</th>
	</tr>


<?php
$servername="localhost";
$username="postgres";
$password="sumSVR@1";


$conn=pg_connect("host=localhost port=5432 dbname=anathashishu user=postgres password=sumSVR@1");

if(!$conn)
	echo "Connection failed to the database";




$query= pg_query($conn, "SELECT name, item, date, quantity FROM organization where name='$name'");

if(!$query)
	echo "An error occured";

while($row = pg_fetch_row($query))
{ ?>
	<tr>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[0];?></center></td>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[1];?></center></td>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[2];?></center></td>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[3];?></center></td>
	</tr>
	<?php
}?>
</table>

</center>

</body>
</html>