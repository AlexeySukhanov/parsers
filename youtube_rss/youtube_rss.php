<?php

$channel_id = 'UCVfrS1hQiDwmZVY2GvNGbuw';
$uri = 'https://www.youtube.com/feeds/videos.xml?channel_id=' . $channel_id;

$xml = @file_get_contents( $uri ) or die( 'Unable to get content. Check your connection or channel ID.' );
$root = @simplexml_load_string( $xml ) or die( 'Unable to get content. Probably the received content is not in XML format.' );
$ns = $root->getNamespaces(true);
$channel_name = $root->author->name;


echo '<h1>Список ссылок на новые видео с канала ' . $channel_name .  ':</h1>';
foreach( $root as $node ) { // Перебираем записи
    if( $node->getName() == 'entry' ) {

         $media_group_root = $node->children( $ns['media'] ); // Получаем корневой узел media:group
         $media_group = $media_group_root->group; // Получаем элемент media:group

         $title = $media_group->title; // Название видео
         $description = $media_group->description; // Краткое описание
         $video_src = $media_group->content->attributes()['url']; // Video SRC
         $link = $node->link->attributes()['href']; //Video URI
         $thumbnail = $media_group->thumbnail->attributes()['url']; //Thumbnail URI

         echo '<div style="overflow:hidden;max-width: 1200px;margin: 0 auto">';
         echo '<h2>' . $title . '</h2>';
         echo '<div style="display:flex;">';
         echo '<img src="' . $thumbnail . '" style="padding-right:36px;">';
         echo '<p>' . $description . '</p>';
         //echo '<embed src="' . $video_src . '" width="550" height="400" >'; // Источнник видео
         echo '</div>';
         echo '<a href="' . $link . '" style="display:block;text-align:right;">Перейти к простотру</a>';
         echo '<hr>';
         echo '</div>';
    }
}

