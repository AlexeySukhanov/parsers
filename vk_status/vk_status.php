<?php

/* Вывод списка с заданном количеством статусов vk  */

function get_vk_status( $url ) {
    if ( $content = file_get_contents( $url )  ) {

        $start_marker = '<div class="pp_status">';
        $end_marker = '</div>';

        if ( strpos( $content, $start_marker ) ) {
            $pattern = '#(?<=' . $start_marker . ').*(?=' . $end_marker .')#';
            preg_match( $pattern, $content, $result );
            return $url . ' : '.$result[0];
        } else return false;
    } else return false;
}

function print_vk_statuses(  $start_position = 0, $count = 4 ) {
    $i = 0;
    $id = $start_position;
    while ($i < $count ) {
        $url = 'https://vk.com/id' . $id;
        if ( $result = get_vk_status( $url ) ) {
            echo $result;
            echo '<br>';
            $i++;
        }
        $id++;
    }
}

echo '<h1 style="text-align: center">💅 Золотой фонд цитат VK 🤳</h1>';
echo '<br>';

print_vk_statuses( 2000);
