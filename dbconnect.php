<?php
    $mysql_server = "localhost";
    $mysql_admin = "root";
    $mysql_pass = "";
    $mysql_db_name = "przepisy";

    $mysqli = new mysqli($mysql_server, $mysql_admin, $mysql_pass, $mysql_db_name);
    $mysqli->set_charset('utf-8');
    if (mysqli_connect_errno())
    {
        echo "Bład połączenia z bazą danych";
    }