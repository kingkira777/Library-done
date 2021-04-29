<?php 
require_once '../config/connection.php';
$_POST = json_decode(file_get_contents("php://input"),true);


class Books extends App{


    //VARIABLES NEEEDED (same as table columns)
    public $id,
        $title,
        $category,
        $author,
        $published,
        $descriptions,
        $price,
        $datepub,
        $qty;

    // CAT LIST
    function CatList(){
        $g = "SELECT * FROM category ORDER BY id DESC";
        $rg= $this->connection()->prepare($g);
        $rg->execute();
        $catList = $rg->fetchAll();
        echo json_encode($catList);
    }

    //BOOK LIST
    function List(){
        $g = "SELECT * FROM books ORDER BY id DESC";
        $rg = $this->connection()->prepare($g);
        $rg->execute();
        $books = $rg->fetchAll();
        echo json_encode($books);
    }


    //EDIT BOOK
    function Edit(){
        $e = "SELECT * FROM books WHERE id =?";
        $re = $this->connection()->prepare($e);
        $re->execute([$this->id]);
        $info = $re->fetch();
        echo json_encode($info);
    }



    //SAVE BOOK
    function Save(){
        $s = "INSERT INTO books(title, category, author, published, description, price, datepub, quantity)
        VALUES (:title, :category, :author, :published, :description, :price,  :datepub, :quantity)";
        $rs = $this->connection()->prepare($s);
        $rs->execute(array(
            ':title' => $this->title,
            ':category' => $this->category,
            ':author' => $this->author,
            ':published' => $this->published,
            ':description' => $this->descriptions,
            ':price' => $this->price,
            ':datepub' => $this->datepub,
            ':quantity' => $this->qty,
        ));
        echo "saved";
    }


    //UPDATE BOOK
    function Update(){

        $u = "UPDATE books SET title=:title, category=:category, author=:author, 
        published=:published, description=:description, price=:price, datepub=:datepub, quantity=:quantity
        WHERE id=:id";
        $ru = $this->connection()->prepare($u);
        $ru->execute(array(
            ':title' => $this->title,
            ':category' => $this->category,
            ':author' => $this->author,
            ':published' => $this->published,
            ':description' => $this->descriptions,
            ':price' => $this->price,
            ':datepub' => $this->datepub,
            ':quantity' => $this->qty,
            ':id' => $this->id  
        ));
        echo "updated";
    }

    //DELETE BOOK
    function Delete(){
        $d = "DELETE FROM books WHERE id = ?";
        $rd = $this->connection()->prepare($d);
        $rd->execute([$this->id]);
        echo "deleted";
    }

}



//POST REQUEST FROM (book.js)===============================================
$book = new Books();

//SAVE UPDATE POST REQUEST
if(isset($_POST["saveupdatebooks"]) && !empty($_POST["saveupdatebooks"])){
    $id = $_POST["id"];
    $title = $_POST["title"];
    $category = $_POST["category"];
    $author = $_POST["author"];
    $datepub = $_POST["datepub"];
    $qty = $_POST["quantity"];  
    $published = $_POST["published"];
    $price = $_POST["price"];
    $descriptions = $_POST["descriptions"];


    if(!empty($id)){
        $book->id = $id;
        $book->title = $title;
        $book->category = $category;
        $book->author = $author;
        $book->datepub = $datepub;
        $book->qty = $qty;
        $book->published = $published;
        $book->price = $price;
        $book->descriptions = $descriptions;
        $book->Update();
    }else{
        $book->title = $title;
        $book->category = $category;
        $book->author = $author;
        $book->datepub = $datepub;
        $book->qty = $qty;
        $book->published = $published;
        $book->price = $price;
        $book->descriptions = $descriptions;
        $book->Save();
    }
}


//BOOK LIST POST REQUEST
if(isset($_POST["gbooklist"]) && !empty($_POST["gbooklist"])){
    $book->List();
}

//DELETE POST REQUEST
if(isset($_POST["deletBook"]) && !empty($_POST["deletBook"])){
    $id = $_POST["id"];
    $book->id = $id;
    $book->Delete();
}

//EDIT POST REQUEST
if(isset($_POST["editbook"]) && !empty($_POST["editbook"])){
    $id = $_POST["id"];
    $book->id = $id;
    $book->Edit();
}

if(isset($_POST["gcatlist"]) && !empty($_POST["gcatlist"])){
    $book->CatList();
}

if(isset($_POST[""]) && !empty($_POST[""])){
    
}
