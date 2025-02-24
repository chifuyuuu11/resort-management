<?php

require_once '../database/roles.php';

    if (isset($_POST['submit'])) {

        $role = $_POST['role'];

        $result = $role->checkRole($role);

        if ($result == "Successfully Added") {
            $role->addRole($role);
            header("Location: ../add.role.php?". $result);
        } else {
            header("Location: ../add.role.php?". $result);
        }

    }

?>