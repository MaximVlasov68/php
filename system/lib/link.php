<?php
class Link
{
    private $sort;
    private $order;
    private $page;

    function __construct($args) {
        $this->sort = $args['sort'] ?? '';
        $this->order = $args['order'] ?? '';
        $this->page = $args['page'] ?? '';
    }

    public function render($args = []) {
        if (!empty($args['page'])){
            $this->page = $args['page'];
        }

        $result = "?";

        $result .= $this->sort ? "&sort=" . $this->sort : "";
        $result .= $this->order ? "&order=" . $this->order : "";
        $result .= $this->page ? "&page=" . $this->page : "";

        return $result;
    }
}



?>