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
    $rss_feed = file_get_contents("http://feeds.feedburner.com/ign/all");

    $rss_xml = simplexml_load_string($rss_feed);

    echo "<h1>Mein RSS Reader</h1>";

    foreach($rss_xml->channel->item as $item){
        $title = $item->title;
        $link = $item->link;
        $date = $item->pubDate;
        $description = $item->description;

        echo "<div class='item'>";
        echo "<a href='$link'><h3>$title</h3></a>";
        echo "<p>$date<br>$description</p>";
        echo "</div>";
    }
?>
</body>
</html>
