<?php 
require_once '../config/connection.php';
$_POST = json_decode(file_get_contents("php://input"),true);


class Transaction extends App{

    public $id,
        $student,
        $book,
        $bdate,
        $rdate,
        $status,
        $notes;



    function StudentList(){
        $g = "SELECT * FROM students ORDER BY id DESC";
        $rg = $this->connection()->prepare($g);
        $rg->execute();
        $StudList = $rg->fetchAll();
        echo json_encode($StudList);
    }


    function BookList(){
        $g = "SELECT * FROM books ORDER BY id DESC";
        $rg = $this->connection()->prepare($g);
        $rg->execute();
        $BookList = $rg->fetchAll();
        echo json_encode($BookList);
    }

    function TransactionList($status){
        $g = "SELECT a.id, a.bdate, a.rdate, b.lastname, b.firstname, c.title, c.author, c.category FROM  transactions a
            LEFT JOIN students b on a.student = b.id
            LEFT JOIN books c on a.book = c.id
            WHERE a.status = ? 
            ORDER BY a.id DESC";
        $rg = $this->connection()->prepare($g);
        $rg->execute([$status]);
        $transList = $rg->fetchAll();
        echo json_encode($transList);
    }
     
    function SaveBorrowdBooks(){
        $c = "SELECT * FROM transactions WHERE student =? AND book =? AND bdate = ?";
        $rc = $this->connection()->prepare($c);
        $rc->execute([$this->student,$this->book, $this->bdate]);
        if($rc->rowCount() >0){}else{
            $s = "INSERT INTO  transactions(student, book, bdate, status, notes)
            VALUES (?, ?, ?, ?, ?)";
            $rs= $this->connection()->prepare($s);
            $rs->execute([$this->student, $this->book, $this->bdate, $this->status, $this->notes]);  
            echo "saved";
        }
    }


    function UpdateReturendBooks(){
        $e = "UPDATE transactions SET rdate =?, status =? WHERE id =?";
        $re = $this->connection()->prepare($e);
        $re->execute([$this->rdate,$this->status,$this->id]);
        echo "returned";
    }

    function DeleteTransaction(){
        $d = "DELETE FROM transactions WHERE id = ?";
        $rd = $this->connection()->prepare($d);
        $rd->execute([$this->id]);
        echo "deleted";
    }


}


// POST REQUEST=========================================================

$trans = new Transaction();

if(isset($_POST["studlist"]) && !empty($_POST["studlist"])){
    $trans->StudentList();
}

if(isset($_POST["booklist"]) && !empty($_POST["booklist"])){
    $trans->BookList();
}

if(isset($_POST["saveborrowed"]) && !empty($_POST["saveborrowed"])){
    $student = $_POST["student"];
    $books = $_POST["books"];
    $notes = $_POST["notes"];
    $_books = json_decode($books);

    $trans->student = $student;
    foreach($_books as $book){
        $trans->book = $book;
        $trans->bdate = date("Y-m-d");
        $trans->status = 'borrowed';
        $trans->notes = $notes;
        $trans->SaveBorrowdBooks();
    }

}

if(isset($_POST["bbookslist"]) && !empty($_POST["bbookslist"])){
    $status = $_POST["status"];
    $trans->TransactionList($status);
}

if(isset($_POST["returnedbooks"]) && !empty($_POST["returnedbooks"])){
    $ids = $_POST["ids"];
    $rdate = date("Y-m-d");
    $status = "returned";
    $_ids = json_decode($ids);
    foreach($_ids as $id){
        $trans->rdate = $rdate;
        $trans->status = $status;
        $trans->id = $id;
        $trans->UpdateReturendBooks();
    }
}

if(isset($_POST["deletTrans"]) && !empty($_POST["deletTrans"])){
    $id = $_POST["id"];
    $trans->id = $id;
    $trans->DeleteTransaction();
}

if(isset($_POST[""]) && !empty($_POST[""])){
    
}

if(isset($_POST[""]) && !empty($_POST[""])){
    
}