<?php
$connect = mysqli_connect('89.58.47.144','spaceship1TPIF2','P3A*2F)4qA6z.MFs','dbSpaceship');

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>xmas_server</title>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Freund</th>
            <th>Geschenk</th>
        </tr>
<?php
        $FriendsQuery = "SELECT * FROM Friends";
        $result = mysqli_query($connect,$FriendsQuery);

    for ($count = 0; $count < mysqli_num_rows($result); $count++) {
        $row = mysqli_fetch_assoc($result);
        echo "<tr>";
        echo "<td>" . $row['id_Friend'] . " </td>";
        echo "<td>" . $row['friend'] . " </td>";
        echo "<td>" . $row['fi_present'] . " </td></tr>";
    }
    echo "</table>"
    ?>
        <hr>

        <table>
        <tr>
            <th>ID</th>
            <th>Geschenk</th>
            <th>Preis</th>
        </tr>
<?php
        $FriendsQuery = "SELECT * FROM Friends";
        $result = mysqli_query($connect,$FriendsQuery);

    for ($count = 0; $count < mysqli_num_rows($result); $count++) {
        $row = mysqli_fetch_assoc($result);
        echo "<tr>";
        echo "<td>" . $row['id_present'] . " </td>";
        echo "<td>" . $row['present'] . " </td>";
        echo "<td>" . $row['price'] . " </td></tr>";
    }
    echo "</table>"
?>
</body>
</html>
