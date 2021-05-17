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
        $qty,
        $classification,
        $division,
        $section,
        $year,
        $language,
        $subject,
        $shelf,
        $typeof,
        $genre;





    // Genre
    function Genre(){
        $g = "SELECT * FROM genre";
        $rg= $this->connection()->prepare($g);
        $rg->execute();
        $genreList = $rg->fetchAll();
        echo json_encode($genreList);       
    }


    //Subject
    function Subjects(){
        $g = "SELECT * FROM subject";
        $rg= $this->connection()->prepare($g);
        $rg->execute();
        $secList = $rg->fetchAll();
        echo json_encode($secList);
    }


    //Language 
    function Languages(){
        $g = "SELECT * FROM language";
        $rg= $this->connection()->prepare($g);
        $rg->execute();
        $langList = $rg->fetchAll();
        echo json_encode($langList);        
    }


    // Year
    function Years(){
        $g = "SELECT * FROM years";
        $rg= $this->connection()->prepare($g);
        $rg->execute();
        $yearList = $rg->fetchAll();
        echo json_encode($yearList);
    }


    // Section
    function Section(){ 
        $g = "SELECT * FROM sections";
        $rg= $this->connection()->prepare($g);
        $rg->execute();
        $secList = $rg->fetchAll();
        echo json_encode($secList);

    }


    // Division
    function Division(){
        $g = "SELECT * FROM divisions";
        $rg = $this->connection()->prepare($g);
        $rg->execute();
        $divlist = $rg->fetchAll();
        echo json_encode($divlist);
    }

    // Class List
    function ClassList(){
        $g = "SELECT * FROM classifications";
        $rg = $this->connection()->prepare($g);
        $rg->execute();
        $classList = $rg->fetchAll();
        echo json_encode($classList);
    }


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
        $s = "INSERT INTO books(title, category, author, published, description, price, datepub, quantity,
        classification, division, section, year, language, subject, shelf, typeof, genre)
        VALUES (:title, :category, :author, :published, :description, :price,  :datepub, :quantity,
        :classification, :division, :section, :year, :language, :subject, :shelf, :typeof, :genre)";
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
            ':classification' => $this->classification,
            ':division' => $this->division,
            ':section' => $this->section,
            ':year' => $this->year,
            ':language' => $this->language,
            ':subject' => $this->subject,
            ':shelf' =>  $this->shelf,
            ':typeof' => $this->typeof,
            ':genre' => $this->genre
        ));
        echo "saved";
    }


    //UPDATE BOOK
    function Update(){

        $u = "UPDATE books SET title=:title, category=:category, author=:author, 
        published=:published, description=:description, price=:price, datepub=:datepub, quantity=:quantity,
        classification = :classification, division = :division, section = :section, year = :year, language = :language,
        subject = :subject, shelf = :shelf, typeof = :typeof, genre = :genre
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
            ':classification' => $this->classification,
            ':division' => $this->division,
            ':section' => $this->section,
            ':year' => $this->year,
            ':language' => $this->language,
            ':subject' => $this->subject,
            ':shelf' => $this->shelf,
            ':typeof' => $this->typeof,
            ':genre' => $this->genre,
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
    $formdata = $_POST["formdata"];
    $data = json_decode($formdata);

    $book->id = $id;
    $book->title = $data->title;
    $book->category = $data->category;
    $book->author = $data->author;
    $book->published = $data->published;
    $book->descriptions = $data->description;
    $book->price = $data->price;
    $book->datepub = $data->datepub;
    $book->qty = $data->qty;
    $book->classification = $data->classification;
    $book->division = $data->division;
    $book->section = $data->section;
    $book->year = $data->year;
    $book->language = $data->language;
    $book->subject = $data->subject;
    $book->shelf = $data->shelf;
    $book->typeof = $data->typeof;
    $book->genre = $data->genre;


    if(!empty($id)){
        $book->Update();
    }else{
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


if(isset($_POST["classList"]) && !empty($_POST["classList"])){
    $book->ClassList();
}

if(isset($_POST["divlist"]) && !empty($_POST["divlist"])){
    $book->Division();
}

if(isset($_POST["sectionList"]) && !empty($_POST["sectionList"])){
    $book->Section();
}

if(isset($_POST["yearlist"]) && !empty($_POST["yearlist"])){
    $book->Years();
}

if(isset($_POST["languageList"]) && !empty($_POST["languageList"])){
    $book->Languages();
}


if(isset($_POST["subjectlist"]) && !empty($_POST["subjectlist"])){
    $book->Subjects();
}

if(isset($_POST["genreList"]) && !empty($_POST["genreList"])){
    $book->Genre();
}

if(isset($_POST[""]) && !empty($_POST[""])){
    
}

if(isset($_POST[""]) && !empty($_POST[""])){
    
}

