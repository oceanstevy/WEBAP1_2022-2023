<?php
$connect = mysqli_connect('localhost','gromi088','2003101603833','gromi088');

    if (isset($_GET['table'])){
        if ($_GET['table'] === "friend"){

            $FriendsQuery = "SELECT * FROM Friends";

            $result = mysqli_query($connect,$FriendsQuery);
            $friends = array();

            for ($count = 0; $count < mysqli_num_rows($result); $count++) {
                $row = mysqli_fetch_assoc($result);

                $friends[] = [
                    "id" => $row['id_friend'],
                    "friend" => $row['friend'],
                    "present" => $row['fi_present']
                ];
            }
            $json = json_encode($friends);
            header('Content-Type: application/json');
            echo $json;


        }else echo "table wert ungültig";

    }else
        echo "Bitte gib den wert Table in der URL an wie folgt: xmax_server.php?table=wert";
        exit();
?>
