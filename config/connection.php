<?php

class App{

    private $host = "localhost",
            $databse = "library",
            $user = "root",
            $password = "";

    function connection(){
        $dsn = "mysql:host=$this->host;dbname=$this->databse";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];
        try{
            $con = new PDO($dsn, $this->user, $this->password, $options);
            return $con;
        } catch (\PDOException $e){
            throw new \PDOException($e->getMessage(),(int)$e->getCode());
        }
    }

}