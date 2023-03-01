<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RSS-Reader</title>
</head>
<body>
<?php
    echo "<h1>Mein RSS Feed</h1>";

   $feed = file_get_contents('http://feeds.feedburner.com/ign/all');
   $rss = simplexml_load_string($feed);

   foreach($rss->channel->item as $item){
       $title = $item -> title;
       $description = $item -> description;
       $link = $item -> link;
       $Date = $item -> pubDate;

       echo"
        <div class='item'>
        <a href='".$link."'><h3>$title</h3></a>
        <p>$Date<br>
        $description</p>
        </div>
       ";
   }
?>
</body>
</html>
