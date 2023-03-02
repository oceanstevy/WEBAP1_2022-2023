<?php

$string = file_get_contents('https://www.rtl.lu/rss/headlines');

$xml = simplexml_load_string($string);


$body = "";

foreach ($xml->channel->item as $item) {
    //echo "<pre>";
    //    print_r($item->enclosure->@attributes);
    //echo "</pre>";
    $body .= "<div>";
        $body .= "<h1>" . $item->title . "</h1>";
        $body .= "<p>" . $item->description . "</p>";
        $body .= "<p>" . $item->pubDate . "</p>";
        //$body .= "<img src='". $item->enclosure->url ."'>";
    $body .= "</div>";
}

echo "$body";

?>

