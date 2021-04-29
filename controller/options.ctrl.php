<?php 
require_once '../config/connection.php';
$_POST = json_decode(file_get_contents("php://input"),true);


class Catergory extends App{

    public $id,
        $category;

    function List(){
        $g = "SELECT * FROM category ORDER BY id DESC";
        $rg= $this->connection()->prepare($g);
        $rg->execute();
        $catList = $rg->fetchAll();
        echo json_encode($catList);
    }

    function Save(){
        $s = "INSERT INTO category(category) VALUES(?)";
        $rs= $this->connection()->prepare($s);
        $rs->execute([$this->category]);
        echo "saved";
    }

    function Delete(){
        $d = "DELETE FROM category WHERE id = ?";
        $rd= $this->connection()->prepare($d);
        $rd->execute([$this->id]);
        echo "deleted";
    }


}


$cat = new Catergory();


if(isset($_POST["savecat"]) && !empty($_POST["savecat"])){
    $category = $_POST["cat"];
    $cat->category = $category;
    $cat->Save();
}

if(isset($_POST["catlist"]) && !empty($_POST["catlist"])){
    $cat->List();
}

if(isset($_POST["deletCat"]) && !empty($_POST["deletCat"])){
    $id = $_POST["id"];
    $cat->id = $id;
    $cat->Delete();
}

if(isset($_POST[""]) && !empty($_POST[""])){
    
}