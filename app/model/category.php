<?php
class CategoryModul
{
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    /* public function create_table(){
        $result = $this->db-> query("
        CREATE TABLE IF NOT EXISTS category(
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL
        ) ENGINE = MyISAM 
        ");
    } */

    public function get($id){
        $result = $this->db->query ("SELECT * FROM  category WHERE id=$id");
    
        return  $result[0];
    }

    public function delete($id){
        $result = $this->db->query ("DELETE FROM category WHERE id = " . $id);
        
    }

    public function add($data){
        if($this->validate($data)){

            $result = $this->db->query ("INSERT INTO category(name) VALUES('". $data['name'] ."')");
            return true;
        } else {
            return false;
        }
    }

    public function edit($data){
        if($this->validate($data)){
            $result = $this->db->query ("UPDATE  category SET name = '".$data['name']."' WHERE id = '".$data['id']."' ");
            return true;
        } else {
            return false;
        }
    }

    public function getAll(){
        $result = $this->db-> query("     
        SELECT * FROM category");

        return $result;
         
    }

    private function validate($data){
        if(strlen($data['name']) < 5){
            echo "Название должно быть более 5 символов";
            return false;
        } elseif (preg_match('/[^A-Za-zА-Яа-я\s]+/', $data['name'])){
            echo "недопустимые символы";
            return false;
        }

        return true;
    }

}


?>