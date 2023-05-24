<?php 
$command = escapeshellcmd('python face.py');
$output = shell_exec($command);
echo $command;
echo "<a href=cancel.php?p=".$command."'>Cancel</a>";
?>