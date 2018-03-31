<?php
/**
 * Created by PhpStorm.
 * User: pleroux
 * Date: 3/31/18
 * Time: 7:29 PM
 */

session_start();
include "../db/setting.php";
include "../db/auth.php";

if (!empty($_SESSION['loggued_on_user'])) {
    if (auth_admin($_SESSION['loggued_on_user'])) {
        $sql = mysqli_connect($servername, $username, $password, $database);
        echo mysqli_error($sql) . "<br>";

        if (!empty($_POST['login']) && !empty($_POST['passwd']))
        {
            $sql = mysqli_connect($servername, $username, $password, $database);
            echo mysqli_error($sql) . "<br>";

            $s = "ALTER TABLE categorie ADD ".$_POST['categorie']." INT";
            $res = mysqli_query($sql, $s);

            echo mysqli_error($sql)."<br>";

            $hash = hash("whirlpool", $_POST['passwd']);

            $s = "INSERT INTO users (login, passwd, prenon, nom, date_de_creation, groupe)\n
                  VALUES ('".$_POST['login']."', '".$hash."', 'admin', 'admin',
                  STR_TO_DATE('".date("d/m/y", time())."', '%d/%m/%y'), 'admin');";
            $res = mysqli_query($sql, $s);

            echo mysqli_error($sql)."<br>";

            if ($res) {
                header("location: ../admin/index.php?loc=admin");
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