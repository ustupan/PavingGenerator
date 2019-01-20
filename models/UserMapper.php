
<?php

require_once 'User.php';
require_once __DIR__.'/../Database.php';

class UserMapper
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getUser(string $email)
    {
        try {
            $stmt = $this->database->connect()->prepare("SELECT * FROM user WHERE email = :email;");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if(!$user['email'])
                return null;

            $userReturn = new User($user['login'], $user['email'], $user['password']);
            $userReturn->setId($this->getId($user['email']));
            return $userReturn;

        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function getId($email)
    {
        try {

            $stmt = $this->database->connect()->prepare("SELECT id FROM user WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user['id'];
        }
        catch (PDOException $e){
            echo 'Error: ' . $e->getMessage();
            exit();
        }
    }

    public function setUser(string $login, string $email, string $password, string $role)
    {
        try {
            $stmt = $this->database->connect()->prepare("INSERT INTO user (login, email, password, role) VALUES (?,?,?,?)");
            $stmt->execute([$login, $email,$password, $role]);
        }
        catch (PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function setUserDetails(string $id, string $userDetailsID){
        try {
            $stmt = $this->database->connect()->prepare("UPDATE user SET user_details_id = $userDetailsID WHERE user.id = $id");
            $stmt->execute();
        }
        catch (PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function getUserDetails($id)
    {
        try {
            $stmt = $this->database->connect()->prepare("
            SELECT user.login, user_details.name, user_details.surname, user_details.phone
            FROM user_details INNER JOIN user on user_details.id = user.user_details_id 
            WHERE user.id = $id;
            ");
            $stmt->execute();

            $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $details;
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function delete(int $id): void
    {
        try {
            $stmt = $this->database->connect()->prepare('DELETE FROM user WHERE id = :id;');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }
        catch(PDOException $e) {
            die();
        }
    }

    public function getUsers()
    {
        try {
            $stmt = $this->database->connect()->prepare('SELECT * FROM user WHERE email != :email;');
            $stmt->bindParam(':email', $_SESSION['email'], PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $user;
        }
        catch(PDOException $e) {
            die();
        }
    }
}