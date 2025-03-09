<?php
    $db_connection = new mysqli("localhost", "zamzamyst", "Dreamzzz@19", "wad_handson");
    if (!$db_connection) 
        die("db_connection gagal: " . mysqli_connect_error());
?>
