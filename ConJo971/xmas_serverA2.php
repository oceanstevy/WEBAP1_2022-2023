<?php
    include 'Include_Functions/Functions.php';

    $dbc = f_db_Connect(false);

    $query = "SELECT idFriend, dtFriend, fiPresent
              FROM tblFriend;";

    $result = f_db_queryWithResultSet($dbc,$query);

    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>FiPresent</th></tr>";

    if (mysqli_num_rows($result) > 0){
        for ($i=0;$i<mysqli_num_rows($result);$i++){
            $row = mysqli_fetch_assoc($result);

            echo "<tr>";
                echo "<td>". $row['idFriend'] ."</td>";
                echo "<td>". $row['dtFriend'] ."</td>";
                echo "<td>". $row['fiPresent'] ."</td>";
            echo "</tr>";
        }
    }

    echo "</table>";
    echo "<br>";

    $query = "SELECT idPresent, dtPresent, dtPrice
              FROM tblPresent;";

    $result = f_db_queryWithResultSet($dbc,$query);

    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>FiPresent</th></tr>";

    if (mysqli_num_rows($result) > 0){
        for ($i=0;$i<mysqli_num_rows($result);$i++){
            $row = mysqli_fetch_assoc($result);

            echo "<tr>";
            echo "<td>". $row['idPresent'] ."</td>";
            echo "<td>". $row['dtPresent'] ."</td>";
            echo "<td>". $row['dtPrice'] ."</td>";
            echo "</tr>";
        }
    }

    echo "</table>";

    mysqli_free_result($result);
    mysqli_close($dbc);
?>
