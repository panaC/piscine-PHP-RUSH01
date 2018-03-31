<h2>Ajouter Produits</h2>
<br><br>
<form action="../db/add_product.php" method="post">
    Titre: <input type="text" name="ti" value="">
    <br>
    Description: <input type="text" name="spec" value="">
    <br>
    Prix: <input type="text" name="price" value="">
    <br><br>
    <input type="submit" value="OK">
</form>

<br><br>
<h2>Visualiser Produits</h2>
<br><br>

<style>
    table, th, td {
        border: 1px solid black;
    }
</style>

<table style="width:100%">
    <tr>
        <th>id</th>
        <th>Titre</th>
        <th>Description</th>
        <th>Prix €</th>
        <th>Date</th>
        <th>Action</th>
    </tr>

<?php
/**
 * Created by PhpStorm.
 * User: pleroux
 * Date: 3/31/18
 * Time: 5:17 PM
 */

if (!empty($_SESSION['loggued_on_user'])) {
    if (auth_admin($_SESSION['loggued_on_user'])) {
        $sql = mysqli_connect($servername, $username, $password, $database);
        echo mysqli_error($sql) . "<br>";

        $s = "SELECT * FROM produit";
        $res = mysqli_query($sql, $s);

        for ($i = 0; $i < mysqli_num_rows($res); $i = $i + 1) {

            echo "<tr>";
            $arr = mysqli_fetch_row($res);
            $id = $arr[0];
            foreach ($arr as $val) {
                echo "<td>" . $val . "</td>";
            }
            echo "<td><a href=\"../db/del_product.php?id=".$id."\">X</a></td>";
            echo "</tr>";
        }
    } else {
        echo "Vous n'avez pas les droits<br>";
    }
} else {
    header("location: ../index.php");
}

?>