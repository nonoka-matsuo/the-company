<?php

require "Database.php";

class User extends Database {

    //register
    public function store($first_name, $last_name, $username, $password){

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(first_name, last_name, username, `password`)
                VALUES('$first_name', '$last_name', '$username', '$password')";

        if($this->conn->query($sql)){
            header("location: ../views"); //go to views index (login)
            exit;
        }else{
            die("Error registering user: ".$this->conn->error);
        }
    }

    public function login($request){ //$request = $_POST

        $sql = "SELECT * FROM users WHERE username = '".$request['username']."'";

        $result = $this->conn->query($sql);

        //check if user is found
        if($result->num_rows == 1){
            $user = $result->fetch_assoc();

            //check if password is correct
            if(password_verify($request['password'], $user['password'])){
                //login
                session_start();
                $_SESSION['username'] = $user['username'];
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['full_name'] = $user['first_name'] . " " . $user['last_name'];

                //go to dashboard page
                header("location: ../views/dashboard.php");
                exit;
            }else{
                die("Password is incorrect.");
            }
        }else{
            die("user not found.");
        }
    }
    public function logout(){
        session_start();
        session_unset();
        session_destroy();

        header("location: ../views"); //go to login page (index)
        exit;
    }

    //return all users
    public function readAll(){
        $sql = "SELECT * FROM users";
        
        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("Error reading all users: ".$this->conn->error);
        }
    }

    //return one user
    public function getUser($id){
        $sql = "SELECT * FROM users WHERE id=$id";

        if($result = $this->conn->query($sql)){
            return $result->fetch_assoc();
        }else{
            die("Error retrieving user: ".$this->conn->error);
        }
    }

    //edit a specific user
    public function editUser($request, $id){
        $sql = "UPDATE users SET
                    first_name = '".$request['first_name']."',
                    last_name = '".$request['last_name']."',
                    username = '".$request['username']."'
                WHERE id=$id";
                
        if($this->conn->query($sql)){
            //update done; go to dashboard
            header("location: ../views/dashboard.php");
            exit;
        }else{
            die("Error updating user: ".$this->conn->error);
        }
    }

    public function deleteUser($id){
        $sql = "DELETE FROM users WHERE id=$id";

        if($this->conn->query($sql)){
            //deleted successfuly; go to dashboard
            header("location: ../views/dashboard.php");
            exit;
        }else{
            die("Error deleting user: ".$this->conn->error);
        }
    }

    public function uploadPhoto($request){ //$request = $_FILES
        $filename = $request['photo']['name'];
        $tmp_file = $request['photo']['tmp_name'];
        $destination = "../assets/images/$filename"; //where to save the photo file
        
        if(move_uploaded_file($tmp_file, $destination)){ //attempt to move the file to images folder
            session_start();
            $sql = "UPDATE users SET photo = '$filename' WHERE id=".$_SESSION['user_id'];

            if($this->conn->query($sql)){
                //success; go back to profile
                header("location: ../views/profile.php");
                exit;
            }else{
                die("Error saving photo: ".$this->conn->error);
            }
        }else{
            die("Cannot move photo.");
        }
    }
}