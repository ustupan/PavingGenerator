<?php
require_once 'User.php';
require_once __DIR__.'/../Database.php';

class AddressMapper
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function setAddress(string $postalCode, string $street, string $locality, string $number)
    {
        try {
            $stmt = $this->database->connect()->prepare("INSERT INTO adress (postal_code, street, locality, number) VALUES (?,?,?,?)");
            $stmt->execute([$postalCode, $street,$locality, $number]);
        }
        catch (PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }
    }
}

