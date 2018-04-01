<?php

session_start();

include "../db/setting.php";

if (!empty($_SESSION['loggued_on_user']) && !empty($_SESSION['panier'])) {

    $sql = mysqli_connect($servername, $username, $password, $database);
    echo mysqli_error($sql) . "<br>";

    $s = "INSERT INTO panier (login, product, total, groupe, date_de_creation)
              VALUES ('".$_SESSION['loggued_on_user']."', '".serialize($_SESSION['panier'])."', '".$_SESSION['panier-total'].
        "', 'current', STR_TO_DATE('".date("d/m/y", time())."', '%d/%m/%y'));";
    $res = mysqli_query($sql, $s);
    echo mysqli_error($sql)."<br>";

    if ($res) {
        $_SESSION['panier'] = "";
        $_SESSION['panier-total'] = "";
        header("location: ../panier/panier.php");
        echo "OK\n";
    }
} else {
    echo "<br>Vous n'êtes pas connecté";
}

?>