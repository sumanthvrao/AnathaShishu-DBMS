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

<div class="topnav">
  <a  href="home_page.html">Home</a>
  <a class="active" href="child_home.html">Child Details</a>
  <a href="adoption_home.html">Adoption Details</a>
  <a href="transachome.html">Tansactions</a>
   <a href="main_organization.html">Organization</a>
   <a style="font-size:14px;font-style:italic;color:black;">Not all of us can do great things, but we can do small things with great love</a>
 </div>
 
<h3 align="center">  <?php echo $name; ?>'s details and his/her background details </h1>
<center>
	<table width="500" cellpadding="5" cellspacing="1"></center> 
	<tr>
        <th style="background-color:orange;">Id</th>
		<th style="background-color:orange;">Name</th>
		<th style="background-color:orange;">Gender</th>
        <th style="background-color:orange;">DOB</th>
        <th style="background-color:orange;">Adhaar_Id</th>
        <th style="background-color:orange;">Date Of Joining</th>
        <th style="background-color:orange;">Phone Number</th>
        <th style="background-color:orange;">Email id</th>
        <th style="background-color:orange;">Type</th>
        <th style="background-color:orange;">Address</th>

	</tr>


<?php
$servername="localhost";
$username="postgres";
$password="sumSVR@1";


$conn=pg_connect("host=localhost port=5432 dbname=anathashishu user=postgres password=sumSVR@1");

if(!$conn)
	echo "Connection failed to the database";




$query= pg_query($conn, "SELECT id, name, gender, dob, aadhar_id, date_of_joining, phno, email_id, type, address FROM Child LEFT OUTER JOIN Child_Background_Details on id=b_id where name='$name'");

if(!$query)
	echo "An error occured";

while($row = pg_fetch_row($query))
{ ?>
	<tr>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[0];?></center></td>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[1];?></center></td>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[2];?></center></td>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[3];?></center></td>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[4];?></center></td>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[5];?></center></td>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[6];?></center></td>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[7];?></center></td>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[8];?></center></td>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[9];?></center></td>


	</tr>
	<?php
}?>
</table>

</center>
</body>
</HTML>