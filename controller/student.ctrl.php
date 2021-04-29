<?php 
require_once '../config/connection.php';
$_POST = json_decode(file_get_contents("php://input"),true);


class Student extends App{

    public $id,
            $no, //Student number
            $firstname,
            $lastname,
            $middlename,
            $dob,
            $contactno,
            $address;


    function List(){
        $g = "SELECT * FROM students ORDER BY id DESC";
        $rg = $this->connection()->prepare($g);
        $rg->execute();
        $students = $rg->fetchAll();
        echo json_encode($students);
    }

    function Edit(){
        $e = "SELECT * FROM students WHERE id =?";
        $re = $this->connection()->prepare($e);
        $re->execute([$this->id]);
        $info = $re->fetch();
        echo json_encode($info);
    }

    function Save(){
        $s = "INSERT INTO students(no,firstname,lastname,middlename,dob,contactno,address)
            VALUES (:no, :firstname, :lastname, :middlename, :dob, :contactno, :address)";
        $rs = $this->connection()->prepare($s);
        $rs->execute(array(
            ':no' => $this->no,
            ':firstname' => $this->firstname,
            ':lastname' => $this->lastname,
            ':middlename' => $this->no,
            ':dob' => $this->dob,
            ':contactno' => $this->contactno,
            ':address' => $this->address
        ));
        echo "saved";
    }

    function Update(){
        $u = "UPDATE students SET no=:no, firstname=:firstname, lastname=:lastname,
        middlename=:middlename, dob=:dob, contactno=:contactno, address=:address WHERE id =:id";
        $ru = $this->connection()->prepare($u);
        $ru->execute(array(
            ':no' => $this->no,
            ':firstname' => $this->firstname,
            ':lastname' => $this->lastname,
            ':middlename' => $this->no,
            ':dob' => $this->dob,
            ':contactno' => $this->contactno,
            ':address' => $this->address,
            ':id' => $this->id
        ));
        echo "updated";

    }

    function Delete(){
        $d = "DELETE FROM students WHERE id = ?";
        $rd = $this->connection()->prepare($d);
        $rd->execute([$this->id]);
        echo "deleted";
    }

}




// POST REQUEST==================================================================

$student = new Student();


if(isset($_POST["saveupdatestudent"]) && !empty($_POST["saveupdatestudent"])){
    $id = $_POST["id"];
    $no = $_POST["no"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $middlename = $_POST["middlename"];
    $dob = $_POST["dob"];
    $contactno = $_POST["contactno"];
    $address = $_POST["address"];


    $student->id = $id;
    $student->no = $no;
    $student->firstname = $firstname;
    $student->lastname = $lastname;
    $student->middlename = $middlename;
    $student->dob = $dob;
    $student->contactno = $contactno;
    $student->address = $address;
    if(!empty($id)){
        $student->Update();
    }else{
        $student->Save();
    }
}

if(isset($_POST["gstudentlist"]) && !empty($_POST["gstudentlist"])){
    $student->List();
}

if(isset($_POST["deletStudent"]) && !empty($_POST["deletStudent"])){
    $id = $_POST["id"];
    $student->id = $id;
    $student->Delete();
    
}


if(isset($_POST["editStudent"]) && !empty($_POST["editStudent"])){
    $id = $_POST["id"];
    $student->id = $id;
    $student->Edit();
    
}

if(isset($_POST[""]) && !empty($_POST[""])){
    
}