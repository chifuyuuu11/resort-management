<?php
    require_once '../database/users.php';

    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = $user->loginUser($username, $password);

        if ($result == "Successfully Logged in") {
            header("Location: ../index.php");

        } else {
            header("Location: ../login.php". $result);
        }
    }
?>