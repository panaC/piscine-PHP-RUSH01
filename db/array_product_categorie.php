<?php
/**
 * Created by PhpStorm.
 * User: pleroux
 * Date: 4/1/18
 * Time: 8:09 PM
 */

function array_product_categorie($cat) {

    include "../db/setting.php";
    $sql = mysqli_connect($servername, $username, $password, $database);
    echo mysqli_error($sql) . "<br>";

    $s = "SELECT ".$cat." FROM categorie";
    $res = mysqli_query($sql, $s);
    echo mysqli_error($sql) . "<br>";

    $arr = array();
    for ($i = 0; $i < mysqli_num_rows($res); $i = $i + 1) {
        $arr[] = mysqli_fetch_row($res);
    }
    return ($arr);
}

?>