<?php
    // mysql_connect() => DEPRECATED / UNSUPORRTED
    // mysqli_connect() => Improved (Prosedural & OOP)
    // PDO (PHP DATA OBJECT)

    // mysql_connect("localhost", "root", "");

    $conn= mysqli_connect("localhost", "root", "", "db_toko");
    if(!$conn){
        echo "Something Error : " . mysqli_connect_error();
    }

?>