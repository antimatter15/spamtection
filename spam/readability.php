<?php
//from http://www.ilovejackdaniels.com/php/gunning-fog-function/ and http://www.ilovejackdaniels.com/php/flesch-kincaid-function/

function gunning_fog_score($text) {
return ((average_words_sentence($text) + percentage_number_words_three_syllables($text)) * 0.4);
}

function calculate_flesch_grade($text) {
return ((.39 * average_words_sentence($text)) + (11.8 * average_syllables_word($text)) - 15.59);
}

function average_syllables_word($text) {
$words = explode(' ', $text);
for ($i = 0; $i < count($words); $i++) {
$syllables = $syllables + count_syllables($words[$i]);
}
return ($syllables/count($words));
}



function average_words_sentence($text) {
$sentences = strlen(preg_replace('/[^\.!?]/', '', $text));
$words = strlen(preg_replace('/[^ ]/', '', $text));
return ($words/$sentences);
}

function percentage_number_words_three_syllables($text) {
$syllables = 0;
$words = explode(' ', $text);
for ($i = 0; $i < count($words); $i++) {
if (count_syllables($words[$i]) > 2) {
$syllables ++;
}
}

$score = number_format((($syllables / count($words)) * 100));

return ($score);
}



function count_syllables($word) {

$subsyl = Array(
'cial'
,'tia'
,'cius'
,'cious'
,'giu'
,'ion'
,'iou'
,'sia$'
,'.ely$'
);

$addsyl = Array(
'ia'
,'riet'
,'dien'
,'iu'
,'io'
,'ii'
,'[aeiouym]bl$'
,'[aeiou]{3}'
,'^mc'
,'ism$'
,'([^aeiouy])\1l$'
,'[^l]lien'
,'^coa[dglx].'
,'[^gq]ua[^auieo]'
,'dnt$'
);

// Based on Greg Fast's Perl module Lingua::EN::Syllables
$word = preg_replace('/[^a-z]/is', '', strtolower($word));
$word_parts = preg_split('/[^aeiouy]+/', $word);
foreach ($word_parts as $key => $value) {
if ($value <> '') {
$valid_word_parts[] = $value;
}
}

$syllables = 0;
foreach ($subsyl as $syl) {
if (strpos($word, $syl) !== false) {
$syllables--;
}
}
foreach ($addsyl as $syl) {
if (strpos($word, $syl) !== false) {
$syllables++;
}
}
if (strlen($word) == 1) {
$syllables++;
}
$syllables += count($valid_word_parts);
$syllables = ($syllables == 0) ? 1 : $syllables;
return $syllables;
}
?>