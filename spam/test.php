<?php
include("encoding.php"); //dependency for linkparser
include("linkparser.php"); //url functions, and detects type of url
include("text.php"); //some text functions

function test(){

echo "<fieldset><legend>BBCODE Translation</legend>";
echo "[url=google.com]google[/url] <br>
[url=google.com]google[/url] <br>
[UrL=gOoGlE.cOm]huh[/uRl]";
echo "<br><br>";
echo str_replace(htmlentities("<br>"),"<br>",htmlentities(BBCodeLinks("[url=google.com]google[/url] <br>
[url=google.com]google[/url] <br>
[UrL=gOoGlE.cOm]huh[/uRl]")));
echo "</fieldset>";

echo "<fieldset><legend>URL Parsing</legend>";
print_r(parseLinkHTML("<a href='shinychese'>wee?</a>"));
echo "</fieldset>";

echo "<fieldset><legend>BBCODE + URL Parsing</legend>";
print_r(parseLinkHTML(BBCodeLinks("[url=google.com]google[/url]")));
echo "<br>";
print_r(parseLinkHTML(BBCodeLinks("[UrL=gOoGlE.cOm]huh[/uRl]")));

echo "</fieldset>";

echo "<fieldset><legend>URL Type</legend>";
echo "google.com - ".linkPageType("google.com");
echo "<br>";
echo "http://it.slashdot.org/article.pl?sid=08/04/12/1737218 - ".linkPageType("http://it.slashdot.org/article.pl?sid=08/04/12/1737218");
echo "<br>";
echo "http://extjs.com/forum/ - ".linkPageType("http://extjs.com/forum/");
echo "<br>";
echo "http://extjs.com/forum/member.php?u=4012 - ".linkPageType("http://extjs.com/forum/member.php?u=4012");
echo "</fieldset>";

echo "<fieldset><legend>URL Domain</legend>";
echo "google.com - ".linkDomain("google.com");
echo "<br>";
echo "http://google.info - ".linkDomain("http://google.info");
echo "<br>";
echo "google.cn - ".linkDomain("google.cn");
echo "<br>";
echo "http://google.au/search?q=turdypoop - ".linkDomain("http://google.au/search?q=turdypoop");
echo "</fieldset>";
echo "<br>";
echo "<fieldset><legend>Vowel Ratio</legend>";
echo "helloworld - ".vowelRatio("helloworld");
echo "<br>";
echo "zxfzlkm - ".vowelRatio("zxfzlkm");
echo "<br>";
echo "localhost - ".vowelRatio("localhost");
echo "<br>";
echo "google.com - ".vowelRatio("google.com");
echo "<br>";
echo "google is nice - ".vowelRatio("google is nice");
echo "<br>";
echo "here goes a normal sentence - ".vowelRatio("here goes a normal sentence");
echo "</fieldset>";
echo "<fieldset><legend>BBCode Strip Links</legend>";
echo "[b]Yo[/b] [i]Dudez[/i] 
Lemme Show you this [b]PwnIn[/b] Site. [i]Dudez[/i]
It'll knock your f*in sockz offz. It'll pwn [u]u[/u]
so friggin hard, [i]you[/i] have no choice but to [i]
lie[/i] on t3h fl00r. [url=google.com]yeah![/url] and
[url=google.com]google[/url] and
[url=google.com]google[/url] uh-huh
[UrL=gOoGlE.cOm]huh[/uRl]
yeah. <br><br> ".BBStripLinks("[b]Yo[/b] [i]Dudez[/i] 
Lemme Show you this [b]PwnIn[/b] Site. [i]Dudez[/i]
It'll knock your f*in sockz offz. It'll pwn [u]u[/u]
so friggin hard, [i]you[/i] have no choice but to [i]
lie[/i] on t3h fl00r. [url=google.com]yeah![/url] and
[url=google.com]google[/url] and
[url=google.com]google[/url] uh-huh
[UrL=gOoGlE.cOm]huh[/uRl]
yeah.");
echo "</fieldset>";

echo "<fieldset><legend>BBCode Strip Tags</legend>";

echo "[b]Yo[/b] [i]Dudez[/i] 
Lemme Show you this [b]PwnIn[/b] Site. [i]Dudez[/i]
It'll knock your f*in sockz offz. It'll pwn [u]u[/u]
so friggin hard, [i]you[/i] have no choice but to [i]
lie[/i] on t3h fl00r. [url=google.com]yeah![/url] and
[url=google.com]google[/url] and
[url=google.com]google[/url] uh-huh
[UrL=gOoGlE.cOm]huh[/uRl]
yeah. <br><br> ".BBStripTags("[b]Yo[/b] [i]Dudez[/i] 
Lemme Show you this [b]PwnIn[/b] Site. [i]Dudez[/i]
It'll knock your f*in sockz offz. It'll pwn [u]u[/u]
so friggin hard, [i]you[/i] have no choice but to [i]
lie[/i] on t3h fl00r. [url=google.com]yeah![/url] and
[url=google.com]google[/url] and
[url=google.com]google[/url] uh-huh
[UrL=gOoGlE.cOm]huh[/uRl]
yeah.");
echo "</fieldset>";
}


test();
?>