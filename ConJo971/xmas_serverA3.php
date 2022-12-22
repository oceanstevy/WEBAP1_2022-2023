<?php
    include 'Include_Functions/Functions.php';

    if (isset($_GET['Table'])){

        $dbc = f_db_Connect(false);

        if ($_GET['Table'] == "friends"){
            $query = "SELECT idFriend, dtFriend, fiPresent
                  FROM tblFriend;";

            $result = f_db_queryWithResultSet($dbc,$query);
            $Frinds = [];

            if (mysqli_num_rows($result) > 0){
                for ($i=0;$i<mysqli_num_rows($result);$i++){
                    $row = mysqli_fetch_assoc($result);

                    $Frinds[$row['idFriend']] = [
                        "id" => $row['idFriend'],
                        "Friend" => $row['dtFriend'],
                        "fiPresent" => $row['fiPresent']
                    ];

                }
            }
            echo json_encode($Frinds);
            mysqli_free_result($result);
        }

        if ($_GET['Table'] == "presents"){
            $query = "SELECT idPresent, dtPresent, dtPrice
                      FROM tblPresent;";

            $result = f_db_queryWithResultSet($dbc,$query);
            $Present = [];

            if (mysqli_num_rows($result) > 0){
                for ($i=0;$i<mysqli_num_rows($result);$i++){
                    $row = mysqli_fetch_assoc($result);

                    $Present[$row['idPresent']] = [
                        "id" => $row['idPresent'],
                        "Friend" => $row['dtPresent'],
                        "fiPresen" => $row['dtPrice']
                    ];

                }
            }

            echo json_encode($Present);
            mysqli_free_result($result);
        }

        mysqli_close($dbc);
    }
?>
