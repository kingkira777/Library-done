<?php 
require_once '../config/connection.php';
$_POST = json_decode(file_get_contents("php://input"),true);


class Catergory extends App{

    public $id,
        $category,
        $year,
        $section,
        $gradelevel,
        $division,
        $genre,
        $language,
        $classfication,
        $subject;


    // SUBJECTt======================================================

    function SubjectList(){
        $g = "SELECT * FROM subject";
        $rg = $this->connection()->prepare($g);
        $rg->execute();
        $subList = $rg->fetchAll();
        echo json_encode($subList);
    }


    function DeleteSubject(){
        $d = "DELETE FROM  subject WHERE id = ?";
        $rd = $this->connection()->prepare($d);
        $rd->execute([$this->id]);
        echo "deleted";
    }


    function SaveSubject(){
        $s = "INSERT INTO subject(name) VALUES (?)";
        $rs = $this->connection()->prepare($s);
        $rs->execute([$this->subject]);
        echo "saved";
    }



    // CLASSIFICATIONS==========================================

    function ClassificationList(){
        $g = "SELECT * FROM classifications";
        $rg = $this->connection()->prepare($g);
        $rg->execute();
        $classList = $rg->fetchAll();
        echo json_encode($classList);
    }


    function DeleteClassification(){    
        $d = "DELETE FROM classifications WHERE id = ?";
        $rd = $this->connection()->prepare($d);
        $rd->execute([$this->id]);
        echo "deleted";
    }


    function SaveClassfication(){
        $s = "INSERT INTO classifications(name) VALUES (?)";
        $rs = $this->connection()->prepare($s);
        $rs->execute([$this->classfication]);
        echo "saved";
    }



    // LANGUAGE =================================================

    function LanguageList(){
        $g = "SELECT * FROM language";
        $rg=  $this->connection()->prepare($g);
        $rg->execute();
        $langList = $rg->fetchAll();
        echo json_encode($langList);
    }


    function DeleteLanguage(){
        $d = "DELETE FROM language WHERE id = ?";
        $rd = $this->connection()->prepare($d);
        $rd->execute([$this->id]);
        echo "deleted";
    }


    function SaveLanguage(){
        $s = "INSERT INTO language(name) VALUES (?)";
        $rs= $this->connection()->prepare($s);
        $rs->execute([$this->language]);
        echo "saved";
    }


    // GENRE =====================================================
    function GenreList(){
        $g = "SELECT * FROM genre";
        $rg = $this->connection()->prepare($g);
        $rg->execute();
        $genreList  = $rg->fetchAll();
        echo json_encode($genreList);
    }


    function DeleteGenre(){
        $d = "DELETE FROM genre WHERE id = ?";
        $rd =$this->connection()->prepare($d);
        $rd->execute([$this->id]);
        echo "deleted";
    }

    function SaveGenre(){
        $s = "INSERT INTO genre(name) VALUES (?)";
        $rs = $this->connection()->prepare($s);
        $rs->execute([$this->genre]);
        echo "saved";
    }


    // DIVISION  =================================================

    function DivisionList(){
        $g = "SELECT * FROM divisions";
        $rg = $this->connection()->prepare($g);
        $rg->execute();
        $divList = $rg->fetchAll();
        echo json_encode($divList);
    }   


    function DeleteDivision(){
        $d = "DELETE FROM divisions WHERE id = ?";
        $rd = $this->connection()->prepare($d);
        $rd->execute([$this->id]);
        echo "deleted";
    }


    function SaveDivision(){
        $s = "INSERT INTO divisions(name) VALUES (?)";
        $rs = $this->connection()->prepare($s);
        $rs->execute([$this->division]);
        echo "saved";
    }



    // GRADE LEVEL================================================
    function GradelevelList(){
        $g = "SELECT * FROM gradelevel";
        $rg= $this->connection()->prepare($g);
        $rg->execute();
        $gradeleveList = $rg->fetchAll();
        echo json_encode($gradeleveList);
    }

    function DeleteGradelevel(){
        $d = "DELETE FROM gradelevel WHERE id =?";
        $rd = $this->connection()->prepare($d);
        $rd->execute([$this->id]);
        echo "deleted";
    }

    function SaveGradelevel(){
        $s = "INSERT INTO gradelevel(name) VALUES (?)";
        $rs= $this->connection()->prepare($s);
        $rs->execute([$this->gradelevel]);
        echo "saved";
    }


    // SECTIONS====================================================

    function SectionList(){
        $g = "SELECT * FROM sections";
        $rg = $this->connection()->prepare($g);
        $rg->execute();
        $sectionList =  $rg->fetchAll();
        echo json_encode($sectionList);
    }

    function DeleteSection(){
        $d = "DELETE FROM sections WHERE id = ?";
        $rd = $this->connection()->prepare($d);
        $rd->execute([$this->id]);
        echo "deleted";
    }

    function SaveSection(){
        $s = "INSERT INTO sections(name) VALUES (?)";
        $rs = $this->connection()->prepare($s);
        $rs->execute([$this->section]);
        echo 'saved';
    }


    // YEAR========================================================
    function ListYear(){
        $g = "SELECT * FROM years";
        $rg = $this->connection()->prepare($g);
        $rg->execute();
        $yearList = $rg->fetchAll();
        echo json_encode($yearList);

    }

    function DeleteYear(){
        $d = "DELETE FROM years WHERE id = ?";
        $rd = $this->connection()->prepare($d);
        $rd->execute([$this->id]);
        echo "deleted";
    }

    function SaveYear(){
        $s = "INSERT INTO years(name) VALUES (?)";
        $rs= $this->connection()->prepare($s);
        $rs->execute([$this->year]);
        echo "saved";
    }


    // CATEGORY====================================================
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








if(isset($_POST["saveyear"]) && !empty($_POST["saveyear"])){
    $year = $_POST["year"];
    $cat->year = $year;
    $cat->SaveYear();
}

if(isset($_POST["yearList"]) && !empty($_POST["yearList"])){
    $cat->ListYear();
}

if(isset($_POST["deletyear"]) && !empty($_POST["deletyear"])){
    $id = $_POST["id"];
    $cat->id = $id;
    $cat->DeleteYear();
}



if(isset($_POST["savesection"]) && !empty($_POST["savesection"])){
    $section = $_POST["section"];
    $cat->section = $section;
    $cat->SaveSection();
}

if(isset($_POST["sectionList"]) && !empty($_POST["sectionList"])){
    $cat->SectionList();
}

if(isset($_POST["deletsection"]) && !empty($_POST["deletsection"])){
    $id = $_POST["id"];
    $cat->id = $id;
    $cat->DeleteSection();
}






if(isset($_POST["savegradelevel"]) && !empty($_POST["savegradelevel"])){
    $gradelevel = $_POST["gradelevel"];
    $cat->gradelevel = $gradelevel;
    $cat->SaveGradelevel();
}

if(isset($_POST["gradelevelList"]) && !empty($_POST["gradelevelList"])){
    $cat->GradelevelList();
}

if(isset($_POST["deletegradelevel"]) && !empty($_POST["deletegradelevel"])){
    $id = $_POST["id"];
    $cat->id = $id;
    $cat->DeleteGradelevel();
}




if(isset($_POST["savedivision"]) && !empty($_POST["savedivision"])){
    $division = $_POST["division"];
    $cat->division = $division;
    $cat->SaveDivision();
}

if(isset($_POST["divisionList"]) && !empty($_POST["divisionList"])){
    $cat->DivisionList();
}


if(isset($_POST["deletedivision"]) && !empty($_POST["deletedivision"])){
    $id = $_POST["id"];
    $cat->id = $id;
    $cat->DeleteDivision();
}





if(isset($_POST["savegenre"]) && !empty($_POST["savegenre"])){
    $genre = $_POST["genre"];
    $cat->genre = $genre;
    $cat->SaveGenre();
}

if(isset($_POST["genreList"]) && !empty($_POST["genreList"])){
    $cat->GenreList();
}


if(isset($_POST["deletegenre"]) && !empty($_POST["deletegenre"])){
    $id = $_POST["id"];
    $cat->id = $id;
    $cat->DeleteGenre();
}






if(isset($_POST["savelang"]) && !empty($_POST["savelang"])){
    $lang = $_POST["lang"];
    $cat->language = $lang;
    $cat->SaveLanguage();   
}

if(isset($_POST["langlist"]) && !empty($_POST["langlist"])){
    $cat->LanguageList();
}

if(isset($_POST["deletelang"]) && !empty($_POST["deletelang"])){
    $id = $_POST["id"];
    $cat->id = $id;
    $cat->DeleteLanguage();
}




if(isset($_POST["savexclass"]) && !empty($_POST["savexclass"])){
    $xclass = $_POST["xclass"];
    $cat->classfication = $xclass;
    $cat->SaveClassfication();
}

if(isset($_POST["classList"]) && !empty($_POST["classList"])){
    $cat->ClassificationList();
}

if(isset($_POST["deleteClass"]) && !empty($_POST["deleteClass"])){
    $id = $_POST["id"];
    $cat->id = $id;
    $cat->DeleteClassification();
}





if(isset($_POST["savesubject"]) && !empty($_POST["savesubject"])){
    $subject = $_POST["subject"];
    $cat->subject = $subject;
    $cat->SaveSubject();
}

if(isset($_POST["sublist"]) && !empty($_POST["sublist"])){
    $cat->SubjectList();
}

if(isset($_POST["deletesub"]) && !empty($_POST["deletesub"])){
    $id = $_POST["id"];
    $cat->id = $id;
    $cat->DeleteSubject();
}





