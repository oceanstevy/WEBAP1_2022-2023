
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 1</title>
</head>
<body>
<?php
$file = file_get_contents("http://feeds.feedburner.com/ign/all.");
$xml = simplexml_load_string($file);

echo "<h1>Mein RSS Feed</h1>";

foreach ($xml -> channel -> item as $item){
    $title = $item -> title;
    $link = $item -> link;
    $pubDate = $item -> pubDate;
    $description = $item -> description;
    echo "<div class='$item'>";
    echo "<a href='$link'><h3>$title</h3></a>";
    echo "<p>$pubDate<br> $description</p>";
    echo "</div>";
}
?>
</body>
</html>
