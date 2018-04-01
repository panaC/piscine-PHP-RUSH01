<?php
/**
 * Created by PhpStorm.
 * User: pleroux
 * Date: 4/1/18
 * Time: 4:24 PM
 */

session_start();

if (!empty($_SESSION['loggued_on_user']))
    echo $_SESSION['loggued_on_user']."<br>";

?>