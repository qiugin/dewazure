<?php
session_start();

// check apakah session username sudah ada atau belum.
// jika belum maka akan diredirect ke halaman index (login)
if( empty($_SESSION['username']) ){
    header('Location: index.php');
}

?>
    

<html>
 <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link rel="stylesheet" href="css/style.css">
     <title>SIA</title>
 </head>
 <body>
<div class="center2">
<!-- Menampilkan isi session username -->
<h3> Hallo Selamat Datang <?php echo $_SESSION['username']; ?> </h3>
    <a href="logout.php">Keluar</a>
 <?php
    $host = "dewserver.database.windows.net";
    $user = "dewadmin";
    $pass = "Dewohat97";
    $db = "yemDB";

    try {
        $conn = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch(Exception $e) {
        echo "Failed: " . $e;
    }

        try {
            $sql_select = "SELECT * FROM mhs_dew";
            $stmt = $conn->query($sql_select);
            $registrants = $stmt->fetchAll(); 
            if(count($registrants) > 0) {
                echo "<h2>People who are registered:</h2>";
                echo '<a href="tambah.php">Tambah Data</a>';
                
                echo "<table>";
                echo "<tr><th>Name</th>";
                echo "<th>NIM</th>";
                echo "<th>Prodi</th>";
                echo "<th>Date</th></tr>";
                foreach($registrants as $registrant) {
                    echo "<tr><td>".$registrant['nama_dew']."</td>";
                    echo "<td>".$registrant['nim_dew']."</td>";
                    echo "<td>".$registrant['prodi_dew']."</td>";
                }
                echo "</table>";
            } else {
                echo "<h3>No one is currently registered.</h3>";
            }
        } catch(Exception $e) {
            echo "Failed: " . $e;
        }
    

 ?>



</div>
 </body>
 </html>