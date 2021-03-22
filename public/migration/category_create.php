<?php

$db_name = "poks3205";
$db_user = "poks3205";
$db_pass = "iPPY2J";
    $db = new PDO("mysql:dbname=$db_name;host=localhost", $db_user, $db_pass);

    if(isset($_GET['up'])){
        echo "накатываем модуль";
        $result = $db-> query("
        CREATE TABLE IF NOT EXISTS category(
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL
        ) ENGINE = MyISAM 
        ");

        $db-> query(
            "ALTER TABLE product ADD category_id INT(11) NULL ");
    } elseif (isset($_GET['down'])){
        echo "откатываем модуль";
        $db-> query(
            "ALTER TABLE product DROP COLUMN category_id  ");
            $db-> query(
                "DROP TABLE ca ");
    }

?>