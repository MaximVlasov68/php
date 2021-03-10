
<?php
require "config.php";
require "lib/db.php";
require "model/category.php";



$db = new DB($db_name, $db_user, $db_pass);
$db->connect;

$category_model = new CategoryModul($db);



//main script 

$action = $_GET['action'] ?? "";
$id =(int) ($_GET['id'] ?? $_POST['id'] ?? 0);
$name = $_POST['name'] ?? "";
$data = $_POST;

?>

<?php

/* if($action == "add") {

require "view/category_form.php";

// изменение 
}  */

if ($action == "edit" && $id){
   $data = $category_model->get($id);
// удаление
}   
elseif($action == "delete"  && $id){
    $category_model->delete($id);
    header("Location: /category.php");
}   
elseif(!empty($_POST) && !$id){
    if($category_model->add($_POST)){
        header("Location: /category.php");
    } else {
        $action = "add";
    }
    
}   
elseif(!empty($_POST) && $id){
    if($category_model->edit($_POST)){
        header("Location: /category.php");
    } else {
        $action = "edit";
    }

}
elseif(!$action) {
     $data = $category_model->getAll();
}


if($action == "add" || $action == "edit") {
    require "../view/category_form.tmp";
} else {
    require "../view/category_table.tmp";
}

?>

