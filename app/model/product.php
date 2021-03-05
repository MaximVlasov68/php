<?php
class ProductModul
{
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    /* public function create_table(){
        $result = $this->db-> query("
        CREATE TABLE IF NOT EXISTS product(
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL
        ) ENGINE = MyISAM 
        ");
    } */

    public function get($id){
        $result = $this->db->query ("SELECT * FROM  product WHERE id=$id");
    
        return  $result[0];
    }

    public function delete($id){
        $result = $this->db->query ("DELETE FROM product WHERE id = " . $id);
        
    }

    public function add($data){
        $result = $this->db->query ("INSERT INTO product(name, category_id) VALUES('". $data['name'] ."' , '". $data['category_id'] ."')");
        
    }

    public function edit($data){
        $result = $this->db->query ("UPDATE  product SET name = '".$data['name']."', category_id = '".$data['category_id']."' WHERE id = '".$data['id']."' ");

    }

    public function getAll(){
        $result = $this->db-> query("     
        SELECT 
            p.id AS id,
            p.name AS name,
            c.name As category_name
        FROM product p
        LEFT JOIN category c ON(c.id = p.category_id)
        ORDER BY id
        ");

        return $result;
         
    }

}


?>