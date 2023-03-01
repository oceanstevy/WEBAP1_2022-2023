<?php
// Zugriffsdaten Datenbank
#-------------- Credentials -------------------#
define('DB_HOST', 'localhost');
define('DB_USER', 'gromi088');
define('DB_PW', '2003101603833');
define('DB_NAME', 'gromi088');

// GET Parameter prüfen und auswerten, Query schreiben
if (isset($_GET['artist'])) {
// GET Parameter für Aufgabe 3 prüfen und auswerten 
    if ($_GET['artist'] === "all") {

     $query =  "SELECT artist FROM song group by artist";

// Skript beenden falls keine Anfrage
    } else {
        die();
    }
}

// Verbindung Datenbank
    $connect = mysqli_connect(DB_HOST,DB_USER,DB_PW,DB_NAME);
// Setzen charset
    mysqli_set_charset($connect, "utf8mb4");

// Anfrage Datenbank
    $result = mysqli_query($connect,$query);
    $artists = array();
    for ($count = 0; $count < mysqli_num_rows($result); $count++) {
        $row = mysqli_fetch_assoc($result);

        $artists[] = [
            "id" => $row['id'],
            "title" => $row['title'],
            "artist" => $row['artist']
        ];
    }
    $json = json_encode($artists);
    header('Content-Type: application/json');
    echo $json;
// Datenbank Zugriff beenden
    mysqli_free_result();

// HTTP Header setzen und JSON senden

    header('Content-Type: application/json');


?>




