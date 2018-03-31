<?php
/**
 * Created by PhpStorm.
 * User: pleroux
 * Date: 3/31/18
 * Time: 3:03 PM
 */

function auth($login, $pass) {
    include "../db/setting.php";

    $hash = hash("whirlpool", $pass);

    $s = "SELECT login FROM users
            WHERE login='".$login."' AND passwd='".$hash."';";

    $sql = mysqli_connect($servername, $username, $password, $database);
    echo mysqli_error($sql)."<br>";
    $res = mysqli_query($sql, $s);

    if (mysqli_num_rows($res) > 0) {
        return true;
    } else
        return false;
}

function auth_admin($login) {
    include "../db/setting.php";

    $s = "SELECT id FROM users
            WHERE login='".$login."' AND groupe='admin';";

    $sql = mysqli_connect($servername, $username, $password, $database);
    echo mysqli_error($sql)."<br>";
    $res = mysqli_query($sql, $s);

    if (mysqli_num_rows($res) > 0) {
        return true;
    } else
        return false;
}

?>