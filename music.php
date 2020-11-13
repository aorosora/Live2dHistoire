<?php 
// Source code frome https://github.com/lychs1998/img-api

$music_array = glob("music/*.{flac,mp3}",GLOB_BRACE); 
 
$domain = 'wordpress.org';
 
$music = array_rand($music_array); 
 
function array2xml($array, $wrap='ROOT', $upper=true) {
    if ($wrap != null) {
        $xml = "<$wrap>\n";
    }
    foreach ($array as $key=>$value) {
        if ($upper == true) {
            $key = strtoupper($key);
        }
        $xml .= "<$key>" . htmlspecialchars(urldecode(trim($value))) . "</$key>";
    }
    if ($wrap != null) {
        $xml .= "\n</$wrap>\n";
    }
    return $xml;
}

$result['error']=0;
$result['result']=500;
$result['music']='//'.$domain.'/'.$music_array[$music];
 
$type=$_GET['type'];
switch ($type)
{

default:
header("Location:".$result['music']);
break;
}
?>
