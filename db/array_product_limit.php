<?php
/**
 * Created by PhpStorm.
 * User: pleroux
 * Date: 4/1/18
 * Time: 7:17 PM
 */

function array_product_limit($lim) {

    include "db/setting.php";
    $sql = mysqli_connect($servername, $username, $password, $database);
    echo mysqli_error($sql) . "<br>";

    $s = "SELECT id, title, spec, price FROM produit LIMIT".$lim;
    $res = mysqli_query($sql, $s);
    echo mysqli_error($sql) . "<br>";

    $arr = array();
    for ($i = 0; $i < mysqli_num_rows($res); $i = $i + 1) {
        $arr[] = mysqli_fetch_row($res);
    }
    return ($arr);
}

?>