<?php 
require_once '../config/connection.php';
$_POST = json_decode(file_get_contents("php://input"),true);


class Auth extends App{

    function Login($username,$password){
        $c = "SELECT * FROM users WHERE username = ? AND password =?";
        $rc = $this->connection()->prepare($c);
        $rc->execute([$username,$password]);
        if($rc->rowCount() > 0){
            session_start();
            $info = $rc->fetch();
            $no = $info["no"];
            $name = $info["name"];
            $username = $info["username"];
            $access = $info["access"];
            $_SESSION["no"] = $no;
            $_SESSION["name"] = $name;
            $_SESSION["username"] = $username;
            $_SESSION["access"] = $access;
            echo "success";
        }else{
            echo "failed";
        }
    }

    function Logout(){
        session_start();
        if(session_destroy()){
            echo "logout";
        }
    }



}


// POST REQUEsT===================================


$auth = new Auth();

if(isset($_POST["login"]) && !empty($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $auth->Login($username,$password);
}

if(isset($_POST[""]) && !empty($_POST[""])){
    
}

if(isset($_POST[""]) && !empty($_POST[""])){
    
}