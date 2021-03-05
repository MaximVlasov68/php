<?php
class DB
{
    public $connect;

    public function __construct($db_name,$db_user,$db_pass){
        $this->connect = new PDO("mysql:dbname=$db_name;host=localhost", $db_user, $db_pass);
    }

    public function query($sql){
        $result = $this->connect-> query($sql, PDO::FETCH_ASSOC);

        return $result->fetchAll();
    }
}
?>