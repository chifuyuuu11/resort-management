<?php

require_once '../database/users.php';

    if (isset($_POST['submit'])) {

        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = $user->checkUsername($username);

        if ($result == "Successfully Added") {
            $user->addUser($firstname, $middlename, $lastname, $username, $password);
            header("Location: ../add.users.php?". $result);
        } else {
            header("Location: ../add.users.php?". $result);
        }

    }

?>