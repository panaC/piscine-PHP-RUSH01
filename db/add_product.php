<?php
/**
 * Created by PhpStorm.
 * User: pleroux
 * Date: 3/31/18
 * Time: 5:31 PM
 */

session_start();
include "../db/setting.php";
include "../db/auth.php";

if (!empty($_SESSION['loggued_on_user'])) {
    if (auth_admin($_SESSION['loggued_on_user'])) {
        $sql = mysqli_connect($servername, $username, $password, $database);
        echo mysqli_error($sql) . "<br>";

        if (!empty($_POST['title']) && !empty($_POST['spec']) && !empty($_POST['price']))
        {
            $sql = mysqli_connect($servername, $username, $password, $database);
            echo mysqli_error($sql) . "<br>";

            $s = "INSERT INTO produit (title, spec, price, date_de_creation)
                  VALUES ('".$_POST['title']."', '".$_POST['spec']."', '".$_POST['price'].
                "', STR_TO_DATE('".date("d/m/y", time())."', '%d/%m/%y'));";
            $res = mysqli_query($sql, $s);

            echo mysqli_error($sql)."<br>";

            if ($res) {
                header("location: ../admin/index.php?loc=product");
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