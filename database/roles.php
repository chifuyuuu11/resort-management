<?php
require_once 'database.php';

class Roles extends Database {
    function selectRole($search = '', $role_id = 0) {
        if ($role_id == 0) {
            $param = "%$search%";
            $sql = "SELECT * FROM tbl_roles WHERE (role LIKE :param)";
            $result = $this->conn()->prepare($sql);
            $result->bindParam(':param', $param);
            $result->execute();
            return $result->fetchAll();

        } else {
            $sql = "SELECT * FROM tbl_roles WHERE role_id = :role_id";
            $result = $this->conn()->prepare($sql);
            $result->bindParam(':role_id', $role_id);
            $result->execute();
            return $result->fetch();
        }

    }  

    function checkRole($role) {
        $sql_role = "SELECT * FROM tbl_roles WHERE role = ?";
        $result_role = $this->conn()->prepare($sql_role);
        $result_role->execute([$role]);

        if ($result_role->rowCount() == 0){
            return "Successfully Added";
        } else {
            return "Role already exists!";
        }
    }

    function addRole($role) {
        $sql = "INSERT INTO tbl_roles (role) VALUES (?)";
        $result = $this->conn()->prepare($sql);
        $result->execute([$role]);

        return $result;
    }
}

$role = new Roles();
?>