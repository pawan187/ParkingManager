<?php

//The URL that we want to GET.
$url = 'https://thingspeak.com/channels/583148/field/1.json';

//Use file_get_contents to GET the URL in question.
$contents = file_get_contents($url);

//If $contents is not a boolean FALSE value.
if($contents !== false){
    //Print out the contents.
    //echo $contents;
}
$obj = json_decode($contents, true);
$n = sizeof($obj['feeds']);
echo $obj['feeds'][$n-1]["field1"];
?>