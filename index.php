<?php
echo file_get_contents('index.txt'); 
$logfile = 'iplog.data';
$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$country = (string) $details->country;
$city = (string) $details->city;
$region = (string) $details->region;
date_default_timezone_set('America/New_York');
$toAdd = "[" . date("M jS, Y - h:ia") . "] - {$country} - {$city} - {$region} - {$ip}";
$current = file_get_contents($logfile);
$new = $toAdd . PHP_EOL . $current;
file_put_contents($logfile, $new);
?>
