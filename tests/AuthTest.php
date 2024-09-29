<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require $_SERVER['DOCUMENT_ROOT'] . "/Utils/Auth.php";

$parameters = array(
    'username' => 'testuser',
    'email' => 'test@example.com',
    'password' => 'password123',
    'role' => 'user',
    'permissions' => 'read,write',
    'is_verified' => 1,
    'is_approved' => 0
);

$auth = new AuthHandler();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    $user = unserialize($_SESSION['user']);
    echo $user->getId();
    ?>
</body>

</html>