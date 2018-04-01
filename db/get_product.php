<?php
/**
 * Created by PhpStorm.
 * User: pleroux
 * Date: 4/1/18
 * Time: 3:33 PM
 */

function get_product($id) {

    include "../db/setting.php";
    $sql = mysqli_connect($servername, $username, $password, $database);
    echo mysqli_error($sql) . "<br>";

    $s = "SELECT title, price FROM produit WHERE id=".$id;
    $res = mysqli_query($sql, $s);

    return (mysqli_fetch_row($res));
}

?>