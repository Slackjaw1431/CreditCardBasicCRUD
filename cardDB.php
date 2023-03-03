<?php

/**
 * Description of cardDB
 *
 * @author talha
 */
class cardDB {
      public static function addCard($userID, $name, $address, $digits) {
        //$db = Database::getDB();
$conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
        $select_db = mysqli_select_db($conn, 'project2') or die(mysqli_error($conn));
        $sql = "INSERT INTO cards SET userID = '$userID', cardName='$name', address ='$address', digits='$digits'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
//        $query = "INSERT INTO cards (userID, cardName, address, digits) VALUES (:userID, :name, :address, :digits)";
        
//        $statement = $db->prepare($query);
//        $statement->bindValue(':userID', $userID);
//        $statement->bindValue(':name', $name);
//        $statement->bindValue(':address', $address);
//        $statement->bindValue(':digits', $digits);
//        $statement->execute();
//        $statement->closeCursor();
    }
    
     public static function deleteCard($cardID) {
        $db = Database::getDB();
        
        $query = "DELETE FROM cards WHERE id = :id";

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $cardID);
        $statement->execute();
        $statement->closeCursor();

    }
       
    public static function editCard($cardID, $name, $address, $digits) {

        $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
        $select_db = mysqli_select_db($conn, 'project2') or die(mysqli_error($conn));
        $sql = "UPDATE cards SET cardName='$name',address='$address',digits='$digits' WHERE id='$cardID'";
        
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    }

}
