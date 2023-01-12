<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PW', '');
define('DB_NAME', 'xmas');


// Create connection
$dbc = new mysqli(DB_HOST, DB_USER, DB_PW, DB_NAME);

// Check connection
if ($dbc->connect_error) {
    die("Connection failed: " . $dbc->connect_error);
}

mysqli_set_charset($dbc, 'utf8');

?>

<form method="post">
    <input id="A2" type="submit" name="A2" value="A2">
</form>

<?php
// Aufgabe 3

if (isset($_POST['A2'])) {

// Friends

    $query = 'SELECT * FROM tblFriends';

    $result = mysqli_query($dbc, $query);

    if (mysqli_errno($dbc)) {
        die('Connect Error (' . mysqli_errno($dbc) . ') ' . mysqli_error($dbc));
    }

    echo "<table border='1'>";
    echo "<tr><th>idFriend</th><th>dtFriend</th><th>fiPresent</th></tr>";

    for($count = 0; $count < mysqli_num_rows($result); $count++) {
        $row = mysqli_fetch_assoc($result);
        echo "<tr><td>" . $row['idFriend'] . "</td><td>" . $row['dtFriend'] . "</td><td>" . $row['fiPresent'] . "</td></tr>";
    }

    echo "</table>";

    mysqli_free_result($result);

// Presents

    $query = 'SELECT * FROM tblPresents';

    $result = mysqli_query($dbc, $query);

    if (mysqli_errno($dbc)) {
        die('Connect Error (' . mysqli_errno($dbc) . ') ' . mysqli_error($dbc));
    }

    echo "<table border='1'>";
    echo "<tr><th>idPresent</th><th>dtPresent</th><th>dtPrice</th></tr>";

    for($count = 0; $count < mysqli_num_rows($result); $count++) {
        $row = mysqli_fetch_assoc($result);
        echo "<tr><td>" . $row['idPresent'] . "</td><td>" . $row['dtPresent'] . "</td><td>" . $row['dtPrice'] . "€</td></tr>";
    }

    echo "</table>";

    mysqli_free_result($result);

}

// Aufgabe 4

if (isset($_GET['table']) && $_GET['table'] == 'presents') {

    echo "<h1>Aufgabe 3 presents</h1>";

    $query = 'SELECT * FROM tblPresents';

    $result = mysqli_query($dbc, $query);
    $present = [];

    if (mysqli_errno($dbc)) {
        die('Connect Error (' . mysqli_errno($dbc) . ') ' . mysqli_error($dbc));
    }

    for($count = 0; $count < mysqli_num_rows($result); $count++) {
        $row = mysqli_fetch_assoc($result);
        $present[] = [
            "id" => $row['idPresent'],
            "Friend" => $row['dtPresent'],
            "Price" => $row['dtPrice'],
        ];
    }

    echo json_encode($present);
    mysqli_free_result($result);

} else if (isset($_GET['table']) && $_GET['table'] == 'friends') {

    echo "<h1>Aufgabe 3 Friends</h1>";

    $query = 'SELECT * FROM tblFriends';

    $result = mysqli_query($dbc, $query);
    $friend = [];

    if (mysqli_errno($dbc)) {
        die('Connect Error (' . mysqli_errno($dbc) . ') ' . mysqli_error($dbc));
    }

    for ($count = 0; $count < mysqli_num_rows($result); $count++) {
        $row = mysqli_fetch_assoc($result);
        $friend[] = [
            "id" => $row['idFriend'],
            "Friend" => $row['dtFriend'],
            "Present" => $row['fiPresent'],
        ];
    }

    // alt to for
    // if ($result) {

    // $resultArray = array();
    // $resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Http header to show that only one JSON was sent
    // header('Content-Type: application/json');

    echo json_encode($friend);
    mysqli_free_result($result);
}

// Aufgabe 5

// xmas_client.html

// Aufgabe 6



?>



