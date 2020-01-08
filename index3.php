<!DOCTYPE html>
<html>
<head>
	<title>Membuat CRUD Dengan PHP Dan MySQL - Menampilkan data dari database</title>
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
</head>
<body>
	<br/>

	<h3>Data user</h3>
<?php
$sql_select = "SELECT * FROM mhs_dew";
$stmt = $conn->query($sql_select);
$registrants = $stmt->fetchAll(); 

	echo "<h2>People who are registered:</h2>";
	echo "<table>";
	echo "<tr><th>Name</th>";
	echo "<th>Email</th>";
	echo "<th>Job</th>";
	echo "<th>Date</th></tr>";
	foreach($registrants as $registrant) {
		echo "<tr><td>".$registrant['nama_dew']."</td>";
		echo "<td>".$registrant['nim_dew']."</td>";
		echo "<td>".$registrant['prodi_dew']."</td>";
	}
	echo "</table>";

?>
</body>
</html>