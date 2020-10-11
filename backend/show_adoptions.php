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

<h3 align="center"> List of all children's adoption details ordered by their date of adoption </h1>
<center>
	<table width="500" cellpadding="5" cellspacing="1"></center>
	<tr>
        <th style="background-color:orange;">Child Id</th>
		<th style="background-color:orange;">New Guardian name</th>
		<th style="background-color:orange;">Email Id of New Guardian</th>
        <th style="background-color:orange;">Address of New Guardian</th>
        <th style="background-color:orange;">Phone Number of New Guardian</th>
        <th style="background-color:orange;">Date Of Adoption</th>
        <th style="background-color:orange;">Aadhar Number</th>
        <th style="background-color:orange;">Pan Number</th>
        <th style="background-color:orange;">Income Proof</th>
        <th style="background-color:orange;">Photo Obtained</th>
        <th style="background-color:orange;">Witness</th>

	</tr>


<?php
$servername="localhost";
$username="postgres";
$password="sumSVR@1";


$conn=pg_connect("host=localhost port=5432 dbname=anathashishu user=postgres password=sumSVR@1");

if(!$conn)
	echo "Connection failed to the database";


$query= pg_query($conn, 'SELECT orphan_id, new_guardian, email_id, address, phno, date_of_adoption, aadhar_id, pan_no, income_proof, photo_obtained, witness FROM Adoption, Adoption_Document_Details where child_id=orphan_id ORDER BY date_of_adoption DESC');
if(!$query)
	echo "An error occured";

while($row= pg_fetch_row($query))
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
	<td style="background-color:#FFEBC5;"><center><?php echo $row[10];?></center></td>

	</tr>
	<?php
}?>

</table>
</center>
</body>
</HTML>