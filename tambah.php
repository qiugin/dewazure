<?php
session_start();

// check apakah session email sudah ada atau belum.
// jika belum maka akan diredirect ke halaman index (login)
if( empty($_SESSION['email']) ){
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
     
     <Title>Registration Form</Title>
 </head>
 <body>

 <div class="center">
    <h1>Tambah Data Mahasiswa</h1>

    <a href="mhs.php"><button type="button" class="btn btn-info">Daftar Mahasiswa</button></a>
    
    <form class="form" method="post" action="" enctype="multipart/form-data" >
          Name  <input type="text" name="nama_dew" id="nama_dew"/></br></br>
          nim <input type="text" name="nim_dew" id="nim_dew"/></br></br>
          prodi <input type="text" name="prodi_dew" id="prodi_dew"/></br></br>
          <input type="submit" name="submit" value="Tambah" />
          <button type="button" name="submit" class="btn btn-success">Success</button>
    </form>
</div>


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

    if (isset($_POST['submit'])) {
        try {
            $name = $_POST['nama_dew'];
            $email = $_POST['nim_dew'];
            $job = $_POST['prodi_dew'];
            // Insert data
            $sql_insert = "INSERT INTO mhs_dew (nama_dew, nim_dew, prodi_dew) 
                        VALUES (?,?,?)";
            $stmt = $conn->prepare($sql_insert);
            $stmt->bindValue(1, $name);
            $stmt->bindValue(2, $email);
            $stmt->bindValue(3, $job);
            $stmt->execute();
        } catch(Exception $e) {
            echo "Failed: " . $e;
        }
        echo "berhasil Menambahkan Data";
    }
 ?>
 </body>
 </html>