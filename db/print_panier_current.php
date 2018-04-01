<br><br>
<h2>Paniers commandés et validés: </h2>
<br>

<style>
    table, th, td {
        border: 1px solid black;
    }
</style>

<table style="width:100%">
    <tr>
        <th>id</th>
        <th>Produit</th>
        <th>Total</th>
        <th>Date</th>
        <th>Action</th>
    </tr>

<?php
/**
 * Created by PhpStorm.
 * User: pleroux
 * Date: 4/1/18
 * Time: 3:12 PM
 */

include "setting.php";

if (!empty($_SESSION['loggued_on_user'])) {
    $sql = mysqli_connect($servername, $username, $password, $database);
    echo mysqli_error($sql) . "<br>";

    $s = "SELECT id, product, total, date_de_creation FROM panier WHERE groupe='current' AND login=".$_SESSION['loggued_on_user'];
    $res = mysqli_query($sql, $s);

    for ($i = 0; $i < mysqli_num_rows($res); $i = $i + 1) {
        $montant = 0;
        echo "<tr>";
        $arr = mysqli_fetch_row($res);
        $id = $arr[0];
        foreach ($arr as $val) {
            echo "<td>" . $val . "</td>";
        }
        echo "<td>" . $montant . " €</td>";
        echo "<td><a href=\"../db/del_panier.php?id=" . $id . "\">X</a></td>";
        echo "</tr>";
    }
} else {
    echo "<br>Vous n'êtes pas connecté";
}

?>

</table>
