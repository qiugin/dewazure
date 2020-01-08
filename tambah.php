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
 <Title>Registration Form</Title>
 <style type="text/css">
 	body { background-color: #fff; border-top: solid 10px #000;
 	    color: #333; font-size: .85em; margin: 20; padding: 20;
 	    font-family: "Segoe UI", Verdana, Helvetica, Sans-Serif;
 	}
 	h1, h2, h3,{ color: #000; margin-bottom: 0; padding-bottom: 0; }
 	h1 { font-size: 2em; }
 	h2 { font-size: 1.75em; }
 	h3 { font-size: 1.2em; }
 	table { margin-top: 0.75em; }
 	th { font-size: 1.2em; text-align: left; border: none; padding-left: 0; }
 	td { padding: 0.25em 2em 0.25em 0em; border: 0 none; }
 </style>
 </head>
 <body>
 <h1>Register here!</h1>
 <p>Fill in your name and email address, then click <strong>Submit</strong> to register.</p>
 <a href="mhs.php">List Mahasiswa</a>
 <form method="post" action="" enctype="multipart/form-data" >
       Name  <input type="text" name="nama_dew" id="nama_dew"/></br></br>
       nim <input type="text" name="nim_dew" id="nim_dew"/></br></br>
       prodi <input type="text" name="prodi_dew" id="prodi_dew"/></br></br>
       <input type="submit" name="submit" value="Submit" />
 </form>
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
            header('Location: mhs.php');
            $stmt = $conn->prepare($sql_insert);
            $stmt->bindValue(1, $name);
            $stmt->bindValue(2, $email);
            $stmt->bindValue(3, $job);
            $stmt->execute();
        } catch(Exception $e) {
            echo "Failed: " . $e;
        }

    }
 ?>
 </body>
 </html>