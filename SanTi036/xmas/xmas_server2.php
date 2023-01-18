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

// Aufgabe 4

if (isset($_GET['friend'])) {

    echo "<h1>Aufgabe 6a</h1>";

    $query = "SELECT f.dtFriend, p.dtPresent, p.dtPrice 
              FROM tblFriends AS f
              INNER JOIN tblPresents AS p
              ON f.fiPresent = p.idPresent
              WHERE dtFriend = '" . $_GET['friend'] . "'
              ORDER BY f.idFriend";

    $result = mysqli_query($dbc, $query);

    if (mysqli_errno($dbc)) {
        die('Connect Error (' . mysqli_errno($dbc) . ') ' . mysqli_error($dbc));
    }

    for($count = 0; $count < mysqli_num_rows($result); $count++) {
        $row = mysqli_fetch_assoc($result);
        $present[] = [
            "Friend" => $row['dtFriend'],
            "Present" => $row['dtPresent'],
            "Price" => $row['dtPrice'],
        ];
    }

    echo json_encode($present);
    mysqli_free_result($result);

}

?>

<h1>Aufgabe 6b</h1>

<?php

    $query = "SELECT f.dtFriend, p.dtPresent, p.dtPrice 
                  FROM tblFriends AS f
                  INNER JOIN tblPresents AS p
                  ON f.fiPresent = p.idPresent";

    $result = mysqli_query($dbc, $query);

    if (mysqli_errno($dbc)) {
        die('Connect Error (' . mysqli_errno($dbc) . ') ' . mysqli_error($dbc));
    }

    echo "<select name='menu' value=''>";

    for($count = 0; $count < mysqli_num_rows($result); $count++) {
        $row = mysqli_fetch_assoc($result);
        echo "<option value=". $row['idFriend'] . ">" . $row['dtFriend'] . "</option>";
    }

    echo "</select>";

        $query = "SELECT f.dtFriend, p.dtPresent, p.dtPrice 
              FROM tblFriends AS f
              INNER JOIN tblPresents AS p
              ON f.fiPresent = p.idPresent
              WHERE f.idFriend = '" . $row['idFriend'] . "'
              ORDER BY f.idFriend";

        $result = mysqli_query($dbc, $query);

        if (mysqli_errno($dbc)) {
            die('Connect Error (' . mysqli_errno($dbc) . ') ' . mysqli_error($dbc));
        }

        for ($count = 0; $count < mysqli_num_rows($result); $count++) {
            $row = mysqli_fetch_assoc($result);
            $present2[] = [
                "Friend" => $row['dtFriend'],
                "Present" => $row['dtPresent'],
                "Price" => $row['dtPrice'],
            ];
        }

        echo json_encode($present2);
        mysqli_free_result($result);

?>

