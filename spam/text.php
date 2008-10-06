<?php

//if vowel ration is less than 0.1 then it is likely spam

function vowelRatio($content){
$vc = 0;
$cc = 0;
foreach(str_split($content) as $letter){
if(strpos("aeiouy",$letter) !== false){
$vc++;
}elseif(strpos("bcdfghjklmnpqrstvwxz",$letter) !== false){
$cc++;
}
}
return $vc/($cc+$vc);
}
?>