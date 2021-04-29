<?php 
require_once '../config/connection.php';
$_POST = json_decode(file_get_contents("php://input"),true);


class Dashboard extends App{


    function CountingDash(){
        $counting = array();

        $b = "SELECT * FROM transactions WHERE status='borrowed'";
        $rb = $this->connection()->prepare($b);
        $rb->execute();
        array_push($counting,$rb->rowCount());

        $r = "SELECT * FROM transactions WHERE status='returned'";
        $rr = $this->connection()->prepare($r);
        $rr->execute();
        array_push($counting,$rr->rowCount());

        
        $s = "SELECT * FROM students";
        $rs = $this->connection()->prepare($s);
        $rs->execute();
        array_push($counting,$rs->rowCount());

        
        $u = "SELECT * FROM users";
        $ru = $this->connection()->prepare($u);
        $ru->execute();
        array_push($counting,$ru->rowCount());

        echo json_encode($counting);

    }


}


// POST REQUEST============================================
$dash = new Dashboard();

if(isset($_POST["gcounting"]) && !empty($_POST["gcounting"])){
    $dash->CountingDash();
}

if(isset($_POST[""]) && !empty($_POST[""])){
    
}

if(isset($_POST[""]) && !empty($_POST[""])){
    
}

if(isset($_POST[""]) && !empty($_POST[""])){
    
}