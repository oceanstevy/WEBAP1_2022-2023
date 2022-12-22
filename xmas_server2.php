<?php require_once './db_functions.php'?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php


        $dbc = f_db_connect(false);

        $query = "SELECT *
                FROM tblFriend";

        $result = f_db_queryWithResultSet($dbc, $query, "Hello");

        echo "<ul>";

        for ($count = 0; $count < mysqli_num_rows($result); $count++) {
            $row = mysqli_fetch_assoc($result);
            echo "<li>" . $row['idFriend'] . " " . $row['dtName'] . " " . $row['fiPresent'] . "</li>";
        }

        echo "</ul>";

        mysqli_free_result($result);

        mysqli_close($dbc);


        $dbc = f_db_connect(false);

        $query = "SELECT *
                    FROM tblPresent";

        $result = f_db_queryWithResultSet($dbc, $query, "Hello");

        echo "<ul>";

        for ($count = 0; $count < mysqli_num_rows($result); $count++) {
            $row = mysqli_fetch_assoc($result);
            echo "<li>" . $row['idPresent'] . " " . $row['dtName'] . " " . $row['dtPrice'] . "</li>";
        }

        echo "</ul>";

        mysqli_free_result($result);

        mysqli_close($dbc);

?>

</body>
</html>
