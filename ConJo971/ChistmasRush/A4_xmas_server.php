<?php
// zugriff5daten Datenbank
require_once("inc/sqlconfig.php");

// verbindng Datenbank
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);

mysqli_set_charset($dbc, 'utf8');

// Get Parameter prüfen usd auswerten
if (isset($_GET['table'])){
    if ($_GET['table'] == "friend"){

        $query = "SELECT idFriend, dtFriend, fiPresent
          FROM tblFriend;";

        $result = mysqli_query($dbc,$query);

        $resultArray = array();

        if (0 < mysqli_num_rows($result)) {

            for ($i = 0; $i < mysqli_num_rows($result); $i++) {

                $row = mysqli_fetch_assoc($result);

                $resultArray[] = [
                    "id" => $row['idFriend'],
                    "friend" => $row['dtFriend'],
                    "Present" => $row['fiPresent']
                ];


            }

            echo json_encode($resultArray);
        }

    } else if ($_GET['table'] == "present"){

        $query = "SELECT idPresent, dtPresent, dtPrice
          FROM tblPresent;";

        $result = mysqli_query($dbc,$query);

        $resultArray = array();

        if (0 < mysqli_num_rows($result)){

            for ($i=0;$i<mysqli_num_rows($result);$i++){

                $row = mysqli_fetch_assoc($result);

                $resultArray[] = [
                    "id" => $row['idPresent'],
                    "present" => $row['dtPresent'],
                    "price" => $row['dtPrice']
                ];


            }

            // Header wird zu JSON umgewandelt
            //header('Content-Type: application/json');

            echo json_encode($resultArray);


        }

    }else {
        mysqli_close($dbc);
        exit();
    }
}




mysqli_free_result($result);
mysqli_close($dbc);
?>
