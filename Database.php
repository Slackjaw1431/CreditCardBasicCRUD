<?php
class Database {
    private static $dsn = 'mysql:host=localhost:3306;dbname=project2';
                          
    private static $username = 'root';
    private static $password = '';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error = "Database access error: " . $e->getMessage();
                $error_msg = "Database access error: " . $e->getMessage();
                include('error.php');
                exit();
            }
        }
        return self::$db;
    }
}
?>
