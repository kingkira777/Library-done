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
            $address,
            $section,
            $gradelevel;


    // GRADELEVEL
    function GradeLevel(){
        $g = "SELECT * FROM gradelevel";
        $rg= $this->connection()->prepare($g);
        $rg->execute();
        $gradelevelList = $rg->fetchAll();
        echo json_encode($gradelevelList);
    } 

     
     // Section
     function Section(){ 
        $g = "SELECT * FROM sections";
        $rg= $this->connection()->prepare($g);
        $rg->execute();
        $secList = $rg->fetchAll();
        echo json_encode($secList);

    }



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
        $s = "INSERT INTO students(no,firstname,lastname,middlename,dob,contactno,address,section,gradelevel)
            VALUES (:no, :firstname, :lastname, :middlename, :dob, :contactno, :address, :section, :gradelevel)";
        $rs = $this->connection()->prepare($s);
        $rs->execute(array(
            ':no' => $this->no,
            ':firstname' => $this->firstname,
            ':lastname' => $this->lastname,
            ':middlename' => $this->no,
            ':dob' => $this->dob,
            ':contactno' => $this->contactno,
            ':address' => $this->address,
            ':section' => $this->section,
            ':gradelevel' => $this->gradelevel
        ));
        echo "saved";
    }

    function Update(){
        $u = "UPDATE students SET no=:no, firstname=:firstname, lastname=:lastname,
        middlename=:middlename, dob=:dob, contactno=:contactno, address=:address,
        section = :section, gradelevel = :gradelevel WHERE id =:id";
        $ru = $this->connection()->prepare($u);
        $ru->execute(array(
            ':no' => $this->no,
            ':firstname' => $this->firstname,
            ':lastname' => $this->lastname,
            ':middlename' => $this->no,
            ':dob' => $this->dob,
            ':contactno' => $this->contactno,
            ':address' => $this->address,
            ':section' => $this->section,
            ':gradelevel' => $this->gradelevel,
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
    $formdata = $_POST["formdata"];
    $data = json_decode($formdata);    


    $student->id = $id;
    $student->no = $data->no;
    $student->firstname = $data->firstname;
    $student->lastname = $data->lastname;
    $student->middlename = $data->middlename;
    $student->dob = $data->dob;
    $student->contactno = $data->contactno;
    $student->address = $data->address;
    $student->section = $data->section;
    $student->gradelevel = $data->gradelevel;

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

if(isset($_POST["gradelevellist"]) && !empty($_POST["gradelevellist"])){
    $student->GradeLevel();
}

if(isset($_POST["sectionlist"]) && !empty($_POST["sectionlist"])){
    $student->Section();
}

if(isset($_POST[""]) && !empty($_POST[""])){
    
}

if(isset($_POST[""]) && !empty($_POST[""])){
    
}



