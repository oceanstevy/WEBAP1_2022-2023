<?php
// zugriff5daten Datenbank
require_once("inc/sqlconfig.php");

// verbindng Datenbank
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);

mysqli_set_charset($dbc, 'utf8');


$query = "SELECT idFriend, dtFriend, fiPresent
          FROM tblFriend;";

$result = mysqli_query($dbc,$query);

if (0 < mysqli_num_rows($result)){

?>

<table>

    <tr>
        <th>id</th>
        <th>Friend</th>
        <th>FiPresent</th>
    </tr>

<?php

    for ($i=0;$i<mysqli_num_rows($result);$i++){

        $row = mysqli_fetch_assoc($result);

        echo "<tr>";
            echo "<td>". $row['idFriend'] ."</td>";
            echo "<td>". $row['dtFriend'] ."</td>";
            echo "<td>". $row['fiPresent'] ."</td>";
        echo "</tr>";

    }

?>

</table>

<?php

} else {

    echo "Nor result fount";

}


$query = "SELECT idPresent, dtPresent, dtPrice
          FROM tblPresent;";

$result = mysqli_query($dbc,$query);

if (0 < mysqli_num_rows($result)){

?>

    <table>

        <tr>
            <th>id</th>
            <th>Present</th>
            <th>Price</th>
        </tr>

<?php

        for ($i=0;$i<mysqli_num_rows($result);$i++){

            $row = mysqli_fetch_assoc($result);

            echo "<tr>";
            echo "<td>". $row['idPresent'] ."</td>";
            echo "<td>". $row['dtPresent'] ."</td>";
            echo "<td>". $row['dtPrice'] ."</td>";
            echo "</tr>";

        }

?>

    </table>

<?php
} else {
    echo "Nor result fount";
}


mysqli_free_result($result);
mysqli_close($dbc);
?>
