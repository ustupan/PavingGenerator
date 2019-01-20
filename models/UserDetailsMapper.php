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

    public function updateUserDetails(int $id,string $name, string $surname, string $phone)
    {
        try {
            $stmt = $this->database->connect()->prepare("UPDATE user_details SET name = :name, 
                        surname =:surname, phone =:phone WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
            $stmt->execute();
        }
        catch (PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function delete(int $id): void
    {
        try {
            $stmt = $this->database->connect()->prepare('DELETE FROM user_details WHERE id = :id;');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }
        catch(PDOException $e) {
            die();
        }
    }

    public function getUserDetails(int $id)
    {
        try {
            $stmt = $this->database->connect()->prepare('SELECT * FROM user_details WHERE id = :id;');
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->execute();
            $userDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $userDetails;
        }
        catch(PDOException $e) {
            die();
        }
    }


}