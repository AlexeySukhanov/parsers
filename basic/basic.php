<?php

/* Парсер статуса вконтакте */
/*
// Исходные данные:
$url = 'https://vk.com/id4345432';  // Адрес страницы vk
$start_marker = '<div class="pp_status">';      // Теги отмечающие начало строки (удаляются из конечного результата)
$end_marker = '</div>';                         // Теги отмечающие конец строки (удаляются из конечного результата)

// Необходимые вычисления:
$content = file_get_contents( $url );
$result = strip_tags( $content, '<div>, <img>' ); // очистка тегов необходимая для того чтобы js не отрабатывал при опытке отобразить страницу

$start_position = strpos( $result, $start_marker );
$result = substr( $result, $start_position );

$end_position = strpos( $result, $end_marker );
$start_marker_length = strlen( $start_marker );
$result = substr( $result, 0, $end_position );
$result = str_replace( $start_marker, '', $result );

echo $result;
*/


/* Парсер статуса вконтакте с помощью regExp */
/*
// Исходные данные
$url = 'https://vk.com/id10120294';  // Адрес страницы vk
$start_marker = '<div class="pp_status">'; // Теги отмечающие начало строки (удаляются из конечного результата)
$end_marker = '</div>'; // Теги отмечающие конец строки (удаляются из конечного результата)

$content = file_get_contents( $url );

$pattern = '#' . $start_marker . '.*' . $end_marker .'#';
$count = preg_match( $pattern, $content, $result );
$result = strip_tags( $result[0] );

echo $result;
*/



