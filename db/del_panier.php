<?php
/**
 * Created by PhpStorm.
 * User: pleroux
 * Date: 4/1/18
 * Time: 5:37 PM
 */

session_start();
include "../db/setting.php";
include "../db/auth.php";

if (!empty($_SESSION['loggued_on_user'])) {
    if (auth_admin($_SESSION['loggued_on_user'])) {
        $sql = mysqli_connect($servername, $username, $password, $database);
        echo mysqli_error($sql) . "<br>";

        if (!empty($_GET['id']))
        {
            $sql = mysqli_connect($servername, $username, $password, $database);
            echo mysqli_error($sql) . "<br>";

            $s = "DELETE FROM panier WHERE id=".$_GET['id'];
            $res = mysqli_query($sql, $s);

            echo mysqli_error($sql)."<br>";

            if ($res) {
                header("location: ../admin/index.php?loc=panier");
                echo "OK\n";
            }
        }
    } else {
        echo "Vous n'avez pas les droits<br>";
    }
} else {
    header("location: ../index.php");
}