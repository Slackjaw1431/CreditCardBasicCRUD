<?php


class Utility {    
    public static function validPassword($email, $password) {
        $db = Database::getDB();
        $query = 'SELECT email,password FROM users WHERE email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(":email", $email);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
    
        if ($row == FALSE)
            return false;
        else if ($row['password'] == $password)
            return true;
        else
            return false;
    } 
    
    public static function userExists($email) {
        $db = Database::getDB();
        $query = 'SELECT * FROM users WHERE email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(":email", $email);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        return ($row != FALSE);
    } 
   

}
