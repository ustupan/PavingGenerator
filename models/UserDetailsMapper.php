<?php
require_once 'UserDetails.php';
require_once __DIR__.'/../Database.php';

class UserDetailsMapper
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function setUserDetails(int $id,string $name, string $surname, string $phone)
    {
        try {
            $stmt = $this->database->connect()->prepare("INSERT INTO user_details (id,name, surname, phone) VALUES (?,?,?,?)");
            $stmt->execute([$id,$name, $surname, $phone]);

        }
        catch (PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }
    }


}