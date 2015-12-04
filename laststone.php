<html>
<body>

Welcome <?php echo $_POST["name"]; ?></br>
You are <?php echo $_POST["age"]; ?> years old.</br>

<?php

echo "Connect to server...</br>";
//$con = mysql_connect("127.0.0.1:3306");
$con = mysql_connect("127.0.0.1:3306","root","Atleast2015");
if(!$con){

	die('Could not connect to DB: '.mysql_error());
}
echo "Server Connected!</br>";

echo "Create DB and if exists, echo msg</br>";
$sql = "CREATE DATABASE laststone";
if(mysql_query($sql, $con)){
	echo "DB created!";
}else{
	echo "Failed to create DB: " . mysql_error() . "</br>";
}

echo "Select DB and create table...</br>";
mysql_select_db("laststone",$con);

$sql = "CREATE TABLE user
	(
		uid int NOT NULL AUTO_INCREMENT,
		PRIMARY KEY(uid),
		name varchar(15),
		age int
	)";
mysql_query($sql,$con);

echo "Insert values to table...</br>";
$sql = "INSERT INTO user (name, age) VALUES ('atleast','31'),('atlast','100')";
mysql_query($sql);

echo "Select data from table....</br>";
$sql = "SELECT * FROM user WHERE name like 'at%' ORDER BY age DESC";
$result = mysql_query($sql);

echo "Display search result...</br>";
echo "<table border ='1'>
	<tr>
	<th>Name</th>
	<th>Age</th>
	</tr>
	";

while($row = mysql_fetch_array($result)){

	echo "<tr>";
	echo "<td>" . $row['name'] . "</td>";
	echo "<td>" . $row['age'] . "</td>";
	echo "</tr>";
}
echo "</table></br>";



echo "Close server connection.";
mysql_close($con);

?>

</body>
</html>
