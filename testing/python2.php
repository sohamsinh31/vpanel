<?php 

$command = escapeshellcmd('python test.py test.txt');
$output = shell_exec($command);
echo $output;
// while($output){
//     echo $output;
// }

?>