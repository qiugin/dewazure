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

    echo ""