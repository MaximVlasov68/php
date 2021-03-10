<?php
require "../app/model/category.php";
require "../app/model/product.php";

class ProductController
{
    private $db;
    private $model;

    function __construct($db){
        $this->db = $db;
        $this->model = new ProductModul($db);
    }
    public function list(){
        $data = $this->model->getAll();
        require "../app/view/products_table.tmp";
    }

    public function add(){
        if(empty($_POST)){
        $category_model = new CategoryModul($this->db);
        $categories = $category_model->getAll();
        require "../app/view/products_form.tmp";
        } else {
            $this->model->add($_POST);
            header("Location: /product/");
        }
    }

    public function edit($id){
        if(empty($_POST)){
        $data = $this->model->get($id);
        $category_model = new CategoryModul($this->db);
        $categories = $category_model->getAll();
        require "../app/view/products_form.tmp";
        } else {
            $this->model->edit($id, $_POST);
            header("Location: /product/");
        }
    }

    public function delete($id){
        $data = $this->model->delete($id);
        header("Location: /product/list");

    }
}

?>