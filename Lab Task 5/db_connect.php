<?php 
function db_conn()
{
    $servername = "localhost";
    $name = "root";
    $password = "";
    $dbname = "restaurant_owner";

    try {
        $conn = new PDO('mysql:host='.$servername.';dbname='.$dbname.';charset=utf8', $name, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        // var_dump($conn) ;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $conn;
}
