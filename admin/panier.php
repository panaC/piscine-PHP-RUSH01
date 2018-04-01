<h2>Visualiser Paniers client</h2>

<style>
    table, th, td {
        border: 1px solid black;
    }
</style>

<table style="width:100%">
    <tr>
        <th>id</th>
        <th>id_user</th>
        <th>Produit</th>
        <th>Date</th>
        <th>Total</th>
        <th>Action</th>
    </tr>

<?php
/**
 * Created by PhpStorm.
 * User: pleroux
 * Date: 3/31/18
 * Time: 7:33 PM
 */

if (!empty($_SESSION['loggued_on_user'])) {
    if (auth_admin($_SESSION['loggued_on_user'])) {
        $sql = mysqli_connect($servername, $username, $password, $database);
        echo mysqli_error($sql) . "<br>";

        $s = "SELECT * FROM panier";
        $res = mysqli_query($sql, $s);

        for ($i = 0; $i < mysqli_num_rows($res); $i = $i + 1) {
            $montant = 0;
            echo "<tr>";
            $arr = mysqli_fetch_row($res);
            $id = $arr[0];
            foreach ($arr as $val) {
                echo "<td>" . $val . "</td>";
            }
            echo "<td>".$montant." €</td>";
            echo "<td><a href=\"../db/del_panier.php?id=".$id."\">X</a></td>";
            echo "</tr>";
        }
    } else {
        echo "Vous n'avez pas les droits<br>";
    }
} else {
    header("location: ../index.php");
}

?>