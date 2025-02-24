<?php
require_once 'database.php';

class Users extends Database {
    function selectUser($search = '', $user_id = 0) {
        if ($user_id == 0) {
            $param = "%$search%";
            $sql = "SELECT *, CONCAT(firstname, ', ', lastname) as fullname FROM tbl_users WHERE (firstname LIKE :param OR lastname LIKE :param)";
            $result = $this->conn()->prepare($sql);
            $result->bindParam(':param', $param);
            $result->execute();
            return $result->fetchAll();

        } else {
            $sql = "SELECT * FROM tbl_users WHERE user_id = :user_id";
            $result = $this->conn()->prepare($sql);
            $result->bindParam(':user_id', $user_id);
            $result->execute();
            return $result->fetch();
        }

    }  
    function addUser($firstname, $middlename, $lastname, $username, $password) {
        $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO tbl_users (firstname, middlename, lastname, username, password) VALUES (?, ?, ?, ?, ?)";
        $result = $this->conn()->prepare($sql);
        $result->execute([$firstname, $middlename, $lastname, $username, $hashed_pass]);

        return $result;
    }

    function checkUsername($username) {
        $sql_username = "SELECT * FROM tbl_users WHERE username = ?";
        $result_username = $this->conn()->prepare($sql_username);
        $result_username->execute([$username]);

        if ($result_username->rowCount() == 0){
            return "Successfully Added";
        } else {
            return "Username already exists!";
        }
    }

    function loginUser($username, $password) {
        $sql_username = "SELECT * FROM tbl_users WHERE username = ?";
        $result_username = $this->conn()->prepare($sql_username);
        $result_username->execute([$username]);
    
        $row = $result_username->fetch(PDO::FETCH_ASSOC);
    
        if(!$row) {
            return "Username doesn't exist";
    
        } else {
            $check = password_verify($password, $row['password']);
            if ($check) {
                return "Successfully Logged in";
            } else {
                return "Password doesn't match";
            }
        }
    }

    function editUser($firstname, $middlename, $lastname, $username, $password, $user_id) {
        $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE tbl_users SET firstname = ?, middlename = ?, lastname = ?, username = ?, password = ? WHERE user_id = ?";
        $result_update = $this->conn()->prepare($sql);
        $result_update->execute([$firstname, $middlename, $lastname, $username, $hashed_pass, $user_id]);

        return $result_update;
    }

    function deleteUser($user_id) {
        $sql = "DELETE FROM tbl_users WHERE user_id = ?";
        $result_delete = $this->conn()->prepare($sql);
        $result_delete->execute([$user_id]);

        return $result_delete;
    }
}

$user = new Users();
?>