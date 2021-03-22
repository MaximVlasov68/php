<?php

$db_name = "poks3205";
$db_user = "poks3205";
$db_pass = "iPPY2J";

    $db = new PDO("mysql:dbname=$db_name;host=localhost", $db_user, $db_pass);

    if(isset($_GET['up'])){
        echo "накатываем модуль";
        $result = $db-> query(
            "CREATE TABLE IF NOT EXISTS user(
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            login VARCHAR(32) NOT NULL,
            password VARCHAR(32) NOT NULL
        ) ENGINE = MyISAM 
        ");

        $result = $db-> query(
            "INSERT INTO user (login, password) VALUES('admin', MD5('admin'))");
        
    } elseif (isset($_GET['down'])){
        echo "откатываем модуль";
        $db-> query(
            "DROP TABLE user ");
    }

?>