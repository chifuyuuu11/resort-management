<?php
require_once '../database/users.php';

$user_id = $_GET['user_id'];

if (isset($_GET['user_id'])) {

    $user->deleteUser($user_id);
    header("Location: ../list.user.php");

} else {
    header("Location: ../list.user.php");
   
}





?>