<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modification mot de passe</title>
</head>
<body>
<form action="modif.php" method="post">
    Identifiant: <input type="text" name="login" value="">
    <br>
    Ancien mot de passe: <input type="password" name="oldpw" value="">
    <br>
    Nouveau mot de passe: <input type="password" name="newpw" value="">
    <br><br>
    <input type="submit" name="submit" value="OK">
</form>
</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 29/03/18
 * Time: 09:39
 */

include "../db/auth.php";
include "../db/setting.php";

if (!empty($_POST['login']) && !empty($_POST['oldpw']) && !empty($_POST['newpw'])
    && !empty($_POST['submit']) && $_POST['submit'] === "OK") {

    $hash = hash("whirlpool", $_POST['newpw']);

    if (auth(trim($_POST['login']), $_POST['oldpw'])) {
        $s = "UPDATE users SET passwd='".$hash."';";

        $sql = mysqli_connect($servername, $username, $password, $database);
        echo mysqli_error($sql)."<br>";
        $res = mysqli_query($sql, $s);

        if ($res) {
            header("location: login.php");
            echo "OK";
        }
    } else {
        echo "<br>Erreur : Votre mot de passe ou votre login est incorrect<br>";
    }
}

?>