<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
<form action="create.php" method="post">
    Login: <input type="text" name="login" value="">
    <br>
    Password: <input type="password" name="passwd" value="">
    <br><br>
    Prenom: <input type="text" name="prenom" value="">
    <br>
    Nom: <input type="text" name="nom" value="">
    <br><br>
    <input type="submit" name="submit" value="OK">
</form>
</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 28/03/18
 * Time: 19:19
 */

include "../db/setting.php";

if (!empty($_POST['login']) && !empty($_POST['passwd']) && !empty($_POST['prenom']) && !empty($_POST['nom'])
    && !empty($_POST['submit']) && $_POST['submit'] === "OK") {

    $sql = mysqli_connect($servername, $username, $password, $database);
    echo mysqli_error($sql)."<br>";

    $s = "SELECT login FROM users
            WHERE login='".$_POST['login']."'";
    $res = mysqli_query($sql, $s);

    if (mysqli_num_rows($res) == 0) {
        $hash = hash("whirlpool", $_POST['passwd']);

        $s = "INSERT INTO users (login, passwd, prenon, nom, date_de_creation, groupe)\n
                  VALUES ('".$_POST['login']."', '".$hash."', '".$_POST['prenom']."', '".$_POST['nom']."',
                  STR_TO_DATE('".date("d/m/y", time())."', '%d/%m/%y'), 'client');";

        $res = mysqli_multi_query($sql, $s);
        echo mysqli_error($sql)."<br>";

        if ($res) {
            header("location: index.php");
            echo "OK\n";
        }
    } else {
        echo "Login deja creer<br>";
    }
}

?>