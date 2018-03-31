<h2>Ajouter Produits dans Categorie</h2>
<br><br>
<form action="../db/add_categorie.php" method="post">
    Id produit: <input type="text" name="id" value="">
    <br>
    Categorie: <input type="text" name="categorie" value="">
    <br><br>
    <input type="submit" value="OK">
</form>

<br><br>
<h2>Visualiser Produits dans Categorie</h2>
<br><br>

<style>
    table, th, td {
        border: 1px solid black;
    }
</style>

<table style="width:100%">
    <tr>
<?php
/**
 * Created by PhpStorm.
 * User: pleroux
 * Date: 3/31/18
 * Time: 5:57 PM
 */

if (!empty($_SESSION['loggued_on_user'])) {
    if (auth_admin($_SESSION['loggued_on_user'])) {
        $sql = mysqli_connect($servername, $username, $password, $database);
        echo mysqli_error($sql) . "<br>";

        $s = "SELECT * FROM categorie";
        $res = mysqli_query($sql, $s);

        for ($y = 0; $y < mysqli_num_fields($res); $y = $y + 1) {
            echo "<th>";
            $arr = mysqli_fetch_field($res);
            echo $arr->name;
            echo "</th>";
        }
        echo "<th>Action</th></tr>";

        for ($i = 0; $i < mysqli_num_rows($res); $i = $i + 1) {

            echo "<tr>";
            $arr = mysqli_fetch_row($res);
            $id = $arr[0];
            foreach ($arr as $val) {
                echo "<td>" . $val . "</td>";
            }
            echo "<td><a href=\"../db/del_categorie.php?id=".$id."\">X</a></td>";
            echo "</tr>";
        }
    } else {
        echo "Vous n'avez pas les droits<br>";
    }
} else {
    header("location: ../index.php");
}

?>