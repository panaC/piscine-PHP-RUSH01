<?php

include "./db/setting.php";
$file = "./db/sql/install.sql";

$sql = mysqli_connect($servername, $username, $password);
$res = mysqli_query($sql, "CREATE DATABASE IF NOT EXISTS db_rush01");
mysqli_close($sql);

if ($res)
{
    echo "DATABASE OK<br>";
    $sql = mysqli_connect($servername, $username, $password, $database);
    echo mysqli_error($sql)."<br>";

    $f = file_get_contents($file);
    $res = mysqli_multi_query($sql, $f);
    echo mysqli_error($sql)."<br>";

    if ($res)
        echo "Tables OK<br>";
}

?>