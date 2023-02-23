<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<?php
$string = file_get_contents('https://www.rtl.lu/rss/headlines');

$xml = simplexml_load_string($string);

foreach ($xml->channel->item as $item) {
    echo "<div>";
        echo "<h2>" . $item->title . "</h2>";
        echo "<p>" . $item->description . "</p>";
        echo "<br>";
        echo "<p>" . $item->pubDate . "</p>";
    echo "</div>";

}



?>
</body>
