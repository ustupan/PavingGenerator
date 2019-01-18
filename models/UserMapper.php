
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

            return new User($user['login'], $user['email'], $user['password']);
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function setUser(string $login, string $email, string $password)
    {
        try {
            $stmt = $this->database->connect()->prepare("INSERT INTO user (login, email, password) VALUES (?,?,?)");
            $stmt->execute([$login, $email,$password]);
        }
        catch (PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }
    }
}