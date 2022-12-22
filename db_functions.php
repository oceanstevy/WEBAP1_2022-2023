<?php

function f_db_connect($debuggingIsTurnedOn) {
    require_once './db_credentials.php';

    // Connect to dbserver and dbusers
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);

    if (mysqli_connect_errno()) {
        die('Connection Error ' . mysqli_connect_errno() .' : ' . mysqli_connect_error());
    } else {
        if ($debuggingIsTurnedOn) echo 'Connected to db : ' . DB_NAME;
    }

    // Set charset
    mysqli_set_charset($dbc, 'utf8');

    // return the mysqli object
    return $dbc;
}

function f_db_queryWithResultSet($dbc, $query, $queryErrorMiddleText) {
    $result = mysqli_query($dbc, $query);

    if (mysqli_errno($dbc)) {
        echo 'Error ' . mysqli_errno($dbc) . " $queryErrorMiddleText " . mysqli_error($dbc);
    }

    return $result;
}

function f_db_queryWithoutResultSet($dbc, $query, $queryErrorMiddleText) {
    mysqli_query($dbc, $query);

    if (mysqli_errno($dbc)) {
        echo 'Error ' . mysqli_errno($dbc) . " $queryErrorMiddleText " . mysqli_error($dbc);
    }
}

