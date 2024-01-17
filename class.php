<?php
/* Database Connection Handler */
class db{

    /* Global Connection */
    public function connection(){
        global $DB_HOST;
        global $DB_USER;
        global $DB_PASS;
        global $DB_NAME;

        $connection = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
        if ($connection->connect_error) {
            return exit("Connection failed: " . $connection->connect_error);
        } else {
            return $connection;
        }
    }

    /* Make MySQLi Query */
    public function query($query){
        $connection = $this->connection();
        if(!empty($connection)){
            $query = $connection->query($query) or die(mysqli_error($connection));
            return $query;
        } else {
            return exit("Connection failed: " . $connection->connect_error);
        }
    }

    public function prepare($query){
        $connection = $this->connection();
        if(!empty($connection)){
            $query = $connection->prepare($query) or die(mysqli_error($connection));
            return $query;
        } else {
            return exit("Connection failed: " . $connection->connect_error);
        }
    }

    /* Count MySQLi Query */
    public function count($query){
        $row = mysqli_num_rows($query);
        return $row;
    }
    
    /* Fetch MySQLi Query */
    public function fetch($query){
        $fetch = mysqli_fetch_object($query);
        return $fetch;
    }
}

/* Input Handler */
class input{

    /* check server request method is post */
    public function isPost(){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            return true;
        } else {
            return false;
        }
    }

    /* check server request method is get */
    public function isGet(){
        if($_SERVER["REQUEST_METHOD"]=="GET"){
            return true;
        } else {
            return false;
        }
    }

    /* get method post input */
    public function post($inputName){
        global $_POST;
        if(!isset($_POST[$inputName])){
            return false;
        } else if(empty($_POST[$inputName])){
            return "";
        } else {
            return $_POST[$inputName];
        }
    }

    /* get method get input */
    public function get($inputName){
        global $_GET;
        if(!isset($_GET[$inputName])){
            return false;
        } else if(empty($_GET[$inputName])){
            return "";
        } else {
            return $_GET[$inputName];
        }
    }

    /* String Escape */
    public function escape($string){
        $db = new db;
        $connection = $db->connection();

        if(!empty($connection)){// Remove stripslashes from the chain
            $string = mysqli_real_escape_string($connection,stripslashes(strip_tags(htmlspecialchars($string,ENT_QUOTES, 'UTF-8'))));
            return $string;
        } else {
            return exit("Connection failed: " . $connection->connect_error);
        }
    }
}