<?php
require_once 'User.php';
require_once __DIR__.'/../Database.php';

class UserDetailsMapper
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getUserDetails($id)
    {
        try {
            $stmt = $this->database->connect()->prepare("
            SELECT user_details.name, user_details.surname, user_details.phone, adress.postal_code,
            adress.street, adress.locality,adress.number
            FROM user_details INNER JOIN adress on user_details.address_id = adress.id 
            WHERE user_details.id = $id
            ");
            $stmt->execute();

            $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $details;
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function setUserDetails(string $name, string $surname, string $phone)
    {
        try {
            $stmt = $this->database->connect()->prepare("INSERT INTO user_details (name, surname, phone) VALUES (?,?,?)");
            $stmt->execute([$name, $surname, $phone]);
        }
        catch (PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }
    }
}