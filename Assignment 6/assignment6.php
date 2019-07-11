<?php
$servername = "localhost";
$username = "root";

class BaseModel{

    public function findAll($conn, $tableName){
        try {
            $query = $conn->query("SELECT * FROM $tableName");
            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                echo $row['Username'].'<br>';
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
    }

    }

    public function findById($conn, $tableName, $id){
        try {
            $query = $conn->query("SELECT * FROM $tableName WHERE Username='$id'");
            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                echo $row['Username'].'<br>';
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
    }

    }

    public function delete($conn, $tableName, $id){
        try {
            $query = $conn->query("DELETE FROM $tableName WHERE Username='$id'");
            
        } catch (PDOException $e) {
            echo $e->getMessage();
    }

    }

}

class User extends BaseModel{
    public $conn;
    
    public function register($servername, $dbName, $dbUsername, $dbPwd, $tableName){
        
        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $dbUsername, $dbPwd);
        
        $table = "CREATE TABLE $tableName ( 
            username VARCHAR(255) NOT NULL PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            phone VARCHAR(255) NOT NULL,
            pwd VARCHAR(255) NOT NULL
            )";
    
            $conn->exec($table);
        //$stmt = $conn->prepare("INSERT INTO users (username, name, email, phone, password) VALUES (:uname, :name, :email, :phone, :password)");

    }

    public function login($servername, $dbname, $username, $pwd){
        try{
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pwd);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch(PDOException $e){
            echo $e->getMessage();
            return NULL;
        }

    }
}
$a = new User();
$conn = $a->login("localhost", 'test', 'root', "");

// $b = new User();
// $b->register("localhost", 'test', 'root', "", 'test2');

//$a->findAll($conn, 'users');

//$a->findById($conn, 'users', 'Grey');


//$a->delete($conn, 'users', 'Grey');
?>