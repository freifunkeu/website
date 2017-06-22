<?php
require_once "config.inc.php";

// Security check: only allow alphanumeric and these chars: ._-
if(preg_match('/[^a-z_\-\.0-9]/i', $_REQUEST["router"])) {
    die("This router model is unknown. Please contact us to fix this error!");
}

$router=$_REQUEST["router"];
$fileExtension = '';
$baseurl="./";

switch ($_REQUEST["type"]) {
    case '0':
        $type = 'factory';
        break;
    case '1':
        $type = 'sysupgrade';
        $fileExtension = '-sysupgrade';
        break;
    default:
        $type = 'factory'; 
}

if($router === '-1') {
    backlink('Bitte wähle eine Router aus. Den genauen Namen und die Version deines Routers findest du auf seiner Unterseite.');
} else {
    $href=$baseurl . $channel . '/' . $type . '/' . $firmware_prefix . $router . $fileExtension . '.bin';
    header('Location: '.$href);
    echo '<a href="'.$href.'">redirecting</a>';
}

function backlink($t){
    echo "$t<br>\n";
    echo "<br><a href=" . $_SERVER["referer"] . ">zur&uuml;ck</a>\n";
}
