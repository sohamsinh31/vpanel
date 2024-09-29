<?php

define('ALLOWED_ORIGINS', "'http://110.227.228.45:3000', 'http://localhost:3000','http://127.0.0.1','http://192.168.221.123:3000','http://192.168.221.123'");

// Split the string into an array by commas
$origins_array = explode(",", ALLOWED_ORIGINS);

// Print the result
print_r($origins_array);

?>
