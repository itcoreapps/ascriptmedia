<?php

/**
 * @param string $routename
 * @return active
 */

function is_active(string $routename){
    return null !== request()->segment(2) && request()->segment(2) == $routename ? 'active' : '';
}

function getYoutubeId($url){
    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
    return isset($match[1]) ? $match[1] : null;
}
?>
