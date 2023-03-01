<?php
//echo "<h1>Mein RSS Feed</h1>";

$rss_feed = file_get_contents("http://feeds.feedburner.com/ign/all");
$rss_xml = simplexml_load_string($rss_feed);

echo json_encode($rss_xml);

//foreach ($rss_xml->channel->item as $item) {
//    $title = $item->title;
//    $link = $item->link;
//    $pubDate = $item->pubDate;
//    $description = $item->description;
//
//    echo "<div class='$item'>";
//    echo "<a href='$link'><h3>$title</h3></a>";
//    echo "<p>$pubDate<br>";
//    echo "$description</p>";
//    echo "</div>";
//}

