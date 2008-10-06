<?php

function BBStripTags($string){
//modified version of http://www.pixel2life.com/forums/index.php?showtopic=10659&st=20
$search = array(
    '@\[(?i)b\](.*?)\[/(?i)b\]@si',
    '@\[(?i)i\](.*?)\[/(?i)i\]@si',
    '@\[(?i)u\](.*?)\[/(?i)u\]@si',
    '@\[(?i)img\](.*?)\[/(?i)img\]@si',
    '@\[(?i)url=(.*?)\](.*?)\[/(?i)url\]@si',
    '@\[(?i)code\](.*?)\[/(?i)code\]@si'
);
$replace = array(
    ' \\1 ',
    ' \\1 ',
    ' \\1 ',
    ' ',
    ' \\2 ',
    ' \\1 '
);
return preg_replace($search , $replace, $string);
}

function parseLinkHTML($content){
$link_regexp = "/<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>/siU";
if(preg_match_all($link_regexp, $content, $link_matches, PREG_SET_ORDER)){ 
return $link_matches;
}else{
return array();
}
}


function BBCodeLinks($string) {
return preg_replace('@\[url\s*=\s*(.*?)\s*\](.*?)\[\/url\]@si', '<a href="\\1">\\2</a>', $string);
}

function BBStripLinks($string){
return preg_replace('@\[url\s*=\s*(.*?)\s*\](.*?)\[\/url\]@si', ' \\2 ', $string);
}



?>