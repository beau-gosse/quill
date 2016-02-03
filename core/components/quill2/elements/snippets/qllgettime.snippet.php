<?php
/* Return the current UTC time according to the given format*/
date_default_timezone_set('UTC');
$format = $modx->getOption('format', $scriptProperties, 'e B Y'); // e.g. 18 April 2015
$time   = $modx->getOption('time', $scriptProperties, time());
$output = date("$format", $time);
return $output;