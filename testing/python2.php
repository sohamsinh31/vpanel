<?php 
$file = $_POST['download'];
$command = escapeshellcmd('python test.py '.$file);
$output = shell_exec($command);
echo $output;

?>