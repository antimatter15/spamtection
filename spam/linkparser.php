<?php


function countLinksHTML($content){
return count(parseLinkHTML($content));
}



function linkDomain($url){
if(strpos($url,"http://") === false){
$url = "http://".$url;
}

$host = parse_url($url,PHP_URL_HOST);
return substr($host,strrpos($host,"."));
}

function linkPageType($url){
/*
Guesses the link types of urls by keyword clues
such as .forum /forum/ /forums/ blog. blag. news. news/ /news/ /blog/ /wp /w-p, /smf /phpbb etc. article,  board. boards. etc.
*/
$urldata = "nothing";
if(strpos("?",$url)  === false){
$urldata = $url;
}else{
$urldata = substr($url,strrpos("?",$url)+1); //last occurance
}

//Ordered from expected more-common first and less common later

$t1 = array("member","user","profile", //user profiles: dangerous stuff
"phpbb", //sorry guys, but phpbb often has more spam than smf...
"tinyurl" //this is dangerous too
);

$t2 = array("board",
"forum",
"smf"
);

$t3 = array("blog",
"news",
"wp",
"wordpress",
"read",
"archive",
"article"
);


foreach($t1 as $checktype){
if(strpos($urldata,$checktype) !== false){ 
return 1; //danger type one (very high)
}
}

foreach($t2 as $checktype){
if(strpos($urldata,$checktype) !== false){ 
return 2; //danger type two high
}
}

foreach($t3 as $checktype){
if(strpos($urldata,$checktype) !== false){ 
return 3; //danger type three medium
}
}

return 4; //danger type four low

}


?>