<?php 
require_once '../config/connection.php';
$_POST = json_decode(file_get_contents("php://input"),true);


class Users extends App{

    public $id,
            $no, //User number
            $name,
            $username,
            $password,
            $access;


    function List(){
        $g = "SELECT * FROM users ORDER BY id DESC";
        $rg = $this->connection()->prepare($g);
        $rg->execute();
        $UserList =  $rg->fetchAll();
        echo json_encode($UserList);
    }

    function Edit(){
        $e = "SELECT * FROM users WHERE id = ?";
        $re = $this->connection()->prepare($e);
        $re->execute([$this->id]);
        $info = $re->fetch();
        echo json_encode($info);
    }


    function Save(){
        $s = "INSERT INTO users(no,name,username,password, access)
        VALUES (:no, :name, :username, :password, :access)";
        $rs= $this->connection()->prepare($s);
        $rs->execute(array(
            ':no' => $this->no,
            ':name' => $this->name,
            ':username' => $this->username,
            ':password' => $this->password,
            ':access' => $this->access
        ));
        echo "saved";
    }

    function Update(){
        $u = "UPDATE users SET no=:no, name=:name, username=:username, password=:password, access=:access 
        WHERE id=:id";
        $ru = $this->connection()->prepare($u);
        $ru->execute(array(
            ':no' => $this->no,
            ':name' => $this->name,
            ':username' => $this->username,
            ':password' => $this->password,
            ':access' => $this->access,
            ':id' => $this->id
        ));
        echo "updated";
    }


    function Delete(){
        $d = "DELETE FROM users WHERE id = ?";
        $rd= $this->connection()->prepare($d);
        $rd->execute([$this->id]);
        echo "deleted";
    }

}







// POST REQUEST =========================================================

$user = new Users();


if(isset($_POST["saveupdateuser"]) && !empty($_POST["saveupdateuser"])){
    $id = $_POST["id"];
    $no = $_POST["no"];
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $access = $_POST["access"];

    $user->id = $id;
    $user->no =  $no;
    $user->name= $name;
    $user->username = $username;
    $user->password = $password;
    $user->access = $access;

    if(!empty($id)){
        $user->Update();
    }else{
        $user->Save();
    }
}


if(isset($_POST["guserlist"]) && !empty($_POST["guserlist"])){
    $user->List();
}

if(isset($_POST["deletUsers"]) && !empty($_POST["deletUsers"])){
    $id = $_POST["id"];
    $user->id = $id;
    $user->Delete();
}

if(isset($_POST["editusers"]) && !empty($_POST["editusers"])){
    $id = $_POST["id"];
    $user->id = $id;
    $user->Edit();
}

if(isset($_POST[""]) && !empty($_POST[""])){

}

if(isset($_POST[""]) && !empty($_POST[""])){

}