<?php
// Zugriffsdaten Datenbank
define('DB_HOST', 'localhost');
define('DB_USER', 'listener');
define('DB_PW', 'santi036');
define('DB_NAME', 'musiclibrary');

$link = new mysqli(DB_HOST, DB_USER, DB_PW, DB_NAME);

// GET Parameter prüfen und auswerten, Query schreiben
if (isset($_GET['artist']) && $_GET['artist'] == "all") {

    $query = "SELECT * FROM song";

    $result = mysqli_query($link,$query);

    $song = [];

    for ($count = 0; $count < mysqli_num_rows($result); $count++) {
        $row = mysqli_fetch_assoc($result);
        $song[] = [
            "id" => $row['id'],
            "Title" => $row['title'],
            "Artist" => $row['artist'],
        ];
    }
    echo $row['id'];

    mysqli_free_result($result);

// GET Parameter für Aufgabe 3 prüfen und auswerten 

// Skript beenden falls keine Anfrage
} else {
    exit();
}


// Verbindung Datenbank
$link = new mysqli(DB_HOST, DB_USER, DB_PW, DB_NAME);

// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

// Setzen charset
mysqli_set_charset($link, "utf8mb4");

// Anfrage Datenbank
$query = "SELECT * FROM song";

$result = mysqli_query($link,$query);

// Datenbank Zugriff beenden

mysqli_close($link);

// HTTP Header setzen und JSON senden
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($song);
?>