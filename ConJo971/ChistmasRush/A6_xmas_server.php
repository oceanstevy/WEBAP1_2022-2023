<?php
include 'Include_Functions/Functions.php';

if (isset($_GET['Table'])){

    $dbc = f_db_Connect(false);

    if ($_GET['Table'] == "friend"){
        $query = "SELECT idFriend, dtFriend, fiPresent
                  FROM tblFriend;";

        $result = f_db_queryWithResultSet($dbc,$query);
        $Friends = [];

        if (mysqli_num_rows($result) > 0){
            for ($i=0;$i<mysqli_num_rows($result);$i++){
                $row = mysqli_fetch_assoc($result);

                $Friends[] = [
                    "id" => $row['idFriend'],
                    "friend" => $row['dtFriend'],
                    "fiPresent" => $row['fiPresent']
                ];

            }
        }
        echo json_encode($Friends);
        mysqli_free_result($result);
    }

    if ($_GET['Table'] == "present"){
        $query = "SELECT idPresent, dtPresent, dtPrice
                      FROM tblPresent;";

        $result = f_db_queryWithResultSet($dbc,$query);
        $Present = [];

        if (mysqli_num_rows($result) > 0){
            for ($i=0;$i<mysqli_num_rows($result);$i++){
                $row = mysqli_fetch_assoc($result);

                $Present[] = [
                    "id" => $row['idPresent'],
                    "present" => $row['dtPresent'],
                    "price" => $row['dtPrice']
                ];

            }
        }

        echo json_encode($Present);
        mysqli_free_result($result);
    }

    mysqli_close($dbc);
}
?>
