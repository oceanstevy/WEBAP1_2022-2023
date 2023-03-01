<h1>Mein RSS Feed</h1>

<?php
$string = file_get_contents('http://feeds.feedburner.com/ign/all');
$array = simplexml_load_string($string);

foreach ($array->channel->item as $item) {
    $link = $item->link;
    $title = $item->title;
    $date = $item->pubDate;
    $description = $item->description;

    echo "<div class=”item”>
            <a href='{$link}'><h3>{$title}</h3></a>
            <p>{$date}<br>
                {$description}</p>
          </div>";
}