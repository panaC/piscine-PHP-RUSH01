<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 29/03/18
 * Time: 16:56
 */

session_start();

if (!empty($_SESSION['loggued_on_user'])) {
    $_SESSION['loggued_on_user'] = "";
    $_SESSION['panier'] = "";
    $_SESSION['panier-total'] = "";
    header("location: ../index.php");
} else {
    header("location: ../index.php");
}

?>