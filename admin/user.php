<?php
/**
 * Created by PhpStorm.
 * User: pleroux
 * Date: 3/31/18
 * Time: 4:38 PM
 */

include "../db/setting.php";
session_start();


if (!empty($_SESSION['loggued_on_user'])) {
    if (auth_admin($_SESSION['loggued_on_user'])) {
        $sql = mysqli_connect($servername, $username, $password, $database);
        echo mysqli_error($sql) . "<br>";

        $s = "SELECT login, prenon, nom, date_de_creation FROM users
                WHERE groupe='client';";
        $res = mysqli_query($sql, $s);

    } else {
        echo "Vous n'avez pas les droits<br>";
    }
} else {
    header("location: ../index.php");


?>