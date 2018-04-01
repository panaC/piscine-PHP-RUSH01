<?php
/**
 * Created by PhpStorm.
 * User: pleroux
 * Date: 3/31/18
 * Time: 6:09 PM
 */

session_start();
include "../db/setting.php";
include "../db/auth.php";

if (!empty($_SESSION['loggued_on_user'])) {
    if (auth_admin($_SESSION['loggued_on_user'])) {
        $sql = mysqli_connect($servername, $username, $password, $database);
        echo mysqli_error($sql) . "<br>";

        if (!empty($_POST['id']) && !empty($_POST['categorie']))
        {
            $sql = mysqli_connect($servername, $username, $password, $database);
            echo mysqli_error($sql) . "<br>";

            $s = "ALTER TABLE categorie ADD ".$_POST['categorie']." INT";
            $res = mysqli_query($sql, $s);

            echo mysqli_error($sql)."<br>";

            $s = "INSERT INTO categorie (all_cat, ".$_POST['categorie'].")
                  VALUES ('".$_POST['id']."', '".$_POST['id']."');";
            $res = mysqli_query($sql, $s);

            echo mysqli_error($sql)."<br>";

            if ($res) {
                header("location: ../admin/index.php?loc=categorie");
                echo "OK\n";
            }
        }
    } else {
        echo "Vous n'avez pas les droits<br>";
    }
} else {
    header("location: ../index.php");
}

?>