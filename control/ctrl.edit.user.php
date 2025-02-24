<?php
require_once '../database/users.php';

$user_id = $_GET['user_id'];

if (isset($_POST['submit'])) {

    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($user->editUser($firstname, $middlename, $lastname, $username, $password, $user_id)) {
        header("Location: ../edit.users.php?user_id=". $user_id);

    } else {
        header("Location: ../edit.users.php?user_id=". $user_id);
    }

}

?>