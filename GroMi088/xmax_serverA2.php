<?php
$connect = mysqli_connect('localhost','gromi088','2003101603833','gromi088');

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
        echo "<td>" . $row['id_friend'] . " </td>";
        echo "<td>" . $row['friend'] . " </td>";
        echo "<td>" . $row['fi_present'] . " </td></tr>";
    }
    echo "</table>";
    mysqli_free_result();

    ?>
        <hr>

        <table>
        <tr>
            <th>ID</th>
            <th>Geschenk</th>
            <th>Preis</th>
        </tr>
<?php
        $Query = "SELECT * FROM Presents";
        $result2 = mysqli_query($connect,$Query);

    for ($count = 0; $count < mysqli_num_rows($result2); $count++) {
        $row2 = mysqli_fetch_assoc($result2);
        echo "<tr>";
        echo "<td>" . $row2['id_present'] . " </td>";
        echo "<td>" . $row2['present'] . " </td>";
        echo "<td>" . $row2['price'] . " </td>
        </tr>";
    }
    echo "</table>";
    mysqli_free_result();
?>
</body>
</html>
