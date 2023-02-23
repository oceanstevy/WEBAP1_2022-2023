<?php
$feedS=file_get_contents("http://feeds.feedburner.com/ign/all")

$feed = simplexml_load_string($feedS)

foreach($feed->channel-item as $item)
{
    $title = $item->title;
    $date = $item -> pubDate;
    $description = $item -> description;
    echo "<div class='$item'>"
 }
?>