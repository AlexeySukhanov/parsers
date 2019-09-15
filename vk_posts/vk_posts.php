<?php

/* Вывод списка постов vk  */

function get_vk_posts( $url ) {
    if ( $content = file_get_contents( $url )  ) {

        $start_marker = '<div class="pi_text">';
        $end_marker = '</div>';

        if ( strpos( $content, $start_marker ) ) {
            $pattern = '#' . $start_marker . '.*' . $end_marker .'#';
            preg_match_all( $pattern, $content, $result );
            foreach( $result[0] as &$item) {
                $item = trim( strip_tags( $item, '<br>, <a>' ) );
            }
            return $result;
        } else return false;
    } else return false;
}

echo '<pre>';
print_r( get_vk_posts('https://vk.com/id1099') );
echo '</pre>';
