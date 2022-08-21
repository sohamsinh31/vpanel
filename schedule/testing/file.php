<?php 
$json = file_get_contents('sujal2.json');
$json_data = json_decode($json,true);
// print_r($json_data);
  echo json_encode($json_data);
?>