<?php
require "../app/model/category.php";
require "../app/model/product.php";
require "../system/lib/pagination.php";
require "../system/lib/link.php";

class ProductController
{
    private $db;
    private $model;

    function __construct($db){
        $this->db = $db;
        $this->model = new ProductModul($db);
    }
    public function list(){
        $sort_columns = [
            0 => false,
            1 => "name",
            2 => "category_name"
        ];
        $args['sort'] = $_GET['sort'] ?? "name";
        $args['order'] = $_GET['order'] ?? "asc";

        $args['item_per_page'] = 5;
        $args['page'] = $_GET['page'] ?? 1 ;

        $page_count = ceil($this->model->getTotal() / $args['item_per_page']);


        $link = new Link($args);

        if($args['page'] > $page_count){
            header("Location:" . $link->render(['page' => $page_count]));
        }

        $pagination = new Pagination($args['page'], $page_count);
        $page_list = $pagination->render($link);

        echo $this->model->getTotal();

        $data = $this->model->getAll($args);
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