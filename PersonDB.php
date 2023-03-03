<?php

class Person {

    private $id;
    private $name;
    private $email;
    private $password;

    function __construct($id, $name, $email, $password) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setName($name): void {
        $this->name = $name;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function setPassword($password): void {
        $this->password = $password;
    }

}

class PersonDB {

    public static function createUser($newName, $newEmail, $newPass) {
        $db = Database::getDB();

        $query = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";

        $statement = $db->prepare($query);
        $statement->bindValue(':name', $newName);
        $statement->bindValue(':email', $newEmail);
        $statement->bindValue(':password', $newPass);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function getPersonID($email) {
        $db = Database::getDB();
        $query = 'SELECT id FROM users WHERE email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(":email", $email);
        $statement->execute();
        $row = $statement->fetch();

        $foundId = -1;

        if ($row != FALSE) {
            $foundId = $row['id'];
        }

        $statement->closeCursor();

        return $foundId;
    }

}
