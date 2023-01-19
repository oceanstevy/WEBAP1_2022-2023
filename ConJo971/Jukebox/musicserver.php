<?php
// Zugriffsdaten Datenbank
require_once("inc/sqlconfig.php");

// GET Parameter prüfen und auswerten, Query schreiben
if (isset($_GET['artist'])){
    if ($_GET['artist'] === "all"){
        $query = "SELECT id, title, artist
                  FROM song";
    }

// GET Parameter für Aufgabe 3 prüfen und auswerten
} elseif (isset($_GET['Seachartist'])){

    $query = "SELECT id, title, artist
              FROM song
              WHERE artist LIKE '%".$_GET['Seachartist']."%'";


// Skript beenden falls keine Anfrage
} else {
    exit();
}


// Verbindung Datenbank
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);

// Setzen charset
mysqli_set_charset($dbc, "utf8mb4");

// Anfrage Datenbank
$result = mysqli_query($dbc,$query);

if ($result){
    $resultArray = array();

    for ($i=0;$i<mysqli_num_rows($result);$i++){
        $resultArray[] = mysqli_fetch_assoc($result);
    }

}

// Datenbank Zugriff beenden
mysqli_free_result($result);
mysqli_close($dbc);

// HTTP Header setzen und JSON senden

//header('Content-Type: application/json');

echo json_encode($resultArray);

?>




