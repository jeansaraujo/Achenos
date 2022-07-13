<?php

class Parser {
    private $db;
    public function __construct(){$this->db = new Database();}
	private function __clone(){}

    
    public function checkPassword($password,$confirm){
        if ($password === $confirm){
            return true;
        }else{
            return false;
        }
        }
    public function checkEmail($email){
        $sql 	= "SELECT email FROM usuarios WHERE email=:email";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':email',$email);
        $query->execute();
        if ($query->rowCount() > 0) {
            return true;
        }else{
            return false;
        }
     }
    public function checkUsername($username){
        $sql 	= "SELECT username FROM usuarios WHERE username=:username";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':username',$username);
        $query->execute();
        if ($query->rowCount() > 0) {
            return true;
        }else{
            return false;
        }
     }
    public function getLoginUser($email,$password){
        $sql = "SELECT usuarios.id, pessoal_info.name, usuarios.username, usuarios.email FROM usuarios INNER JOIN pessoal_info ON usuarios.id = pessoal_info.id WHERE email=:email AND password=:password";
        $query =  $this->db->pdo->prepare($sql);
        $query->bindValue(':email',$email);
        $query->bindValue(':password',$password);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
        } 
    public function updateDB($table,$params,$id){
        $sql = "UPDATE $table SET $params=:params WHERE id=:id";
        $query = $this->db->pdo->prepare($sql);
        $query->bindParam(':params',$params);
        $query->bindValue(':id',$id);
        $result = $query->execute();
        return $result;
        } 
}