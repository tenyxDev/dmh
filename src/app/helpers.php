<?php

function num_word($value, $words, $show = true)
{
    $num = $value % 100;
    if ($num > 19) {
        $num = $num % 10;
    }

    $out = ($show) ? $value . '' : '';
    switch ($num) {
        case 1:
            $out .= $words[0];
            break;
        case 2:
        case 3:
        case 4:
            $out .= $words[1];
            break;
        default:
            $out .= $words[2];
            break;
    }

    return $out;
}

function secToStr($secs, $lang = 'en')
{
    $res = '';
    $dayNames = ['d', 'd', 'd'];
    $hourNames = ['h', 'h', 'h'];
    $minNames = ['m', 'm', 'm'];
    $sekNames = ['s', 's', 's'];
    $postFix = ' left';

    if ($lang == 'ru') {
        $dayNames = ['день', 'дня', 'дней'];
        $hourNames = ['час', 'часа', 'часов'];
        $minNames = ['минута', 'минуты', 'минут'];
        $sekNames = ['секунда', 'секунды', 'секунд'];
        $postFix = ' осталось';
    }

    $days = floor($secs / 86400);
    $secs = $secs % 86400;
    $res .= num_word($days, $dayNames) . ', ';

    $hours = floor($secs / 3600);
    $secs = $secs % 3600;
    $res .= num_word($hours, $hourNames) . ', ';

    $minutes = floor($secs / 60);
    $secs = $secs % 60;
    $res .= num_word($minutes, $minNames) . ', ';

    $res .= num_word($secs, $sekNames);

    return $res . $postFix;
}
