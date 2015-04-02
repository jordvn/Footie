<?php
/* This class is used to connect to the database.
 * Since the whole application only needs to connect to one database,
 * this class is made to be a static class.
 */
class myDB {
        
        /* Database is set up on my own server
         * Host: my04.winhost.com
         * DB name: mysql_81347_learning
         * Username: learn
         * Password: 1234@abc
         */
        
        private static $dsn = "mysql:host=my04.winhost.com;dbname=mysql_81347_footie";
        private static $username ="footie";
        private static $password = "1234@abc";
        
        private static $db;
    
        public static function getDB(){
                if(!isset(self::$db)){
                        try{
                                self::$db = new PDO(self::$dsn, self::$username, self::$password);
                        } catch (Exception $ex) {
                                $error_message = $ex->getMessage();
                                include ("../error/db_error.php");
                                exit();
                        }
                }
                return self::$db;
        }
}
?>
