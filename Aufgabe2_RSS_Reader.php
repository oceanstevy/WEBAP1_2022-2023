/* Link zur Aufgabe: */
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Aufgabe2: Mein RSS-Reader </title>
</head>

<body>
    <h1> Mein RSS Feed </h1>


    <?php
    $rss_feed = file_get_contents("http://feeds.feedburner.com/ign/all");
    $rss_xml = simplexml_load_string($rss_feed);

    foreach ($rss_xml->channel->item as $item) {
        $title = $item->title;
        $date = $item->pubDate;
        $link = $item->link;
        $description = $item->description;
        echo "<div class='$item'>";
        echo "<a href='$link'><h3>$title</h3></a>";
        echo "<p>$date<br>$description</p>";
        echo "</div>";
    }


    ?>
</body>

</html>