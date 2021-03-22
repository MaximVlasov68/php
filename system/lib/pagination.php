<?php
class Pagination
{
    private $current;
    private $finish;

    function __construct($current, $finish) {
        $this->current = $current;
        $this->finish = $finish;

    }

    public function render($link) {
        $result = "";

        if ($this->current > 1){
            $result .= "<a href=" . $link->render(['page' => 1 ]) .">1</a>";
        }

        //var_dump($this->current);
        if ($this->current > 3){
            $result .= " <span>...</span> ";
        }

        if ($this->current > 2){
            $i = $this->current - 1;
            $result .= "<a href=" . $link->render(['page' => $i]) . "> " . $i . " </a>";
        }

        $result .= "<strong>" . $this->current . "</strong>";

        if ($this->current < $this->finish - 1){
            $i = $this->current + 1;
            $result .= "<a href=" . $link->render(['page' => $i]) . "> " . $i . " </a>";
            
        }

        if ($this->current < $this->finish - 2){
            $result .= " <span>...</span> ";
           
        } 

        if ($this->current != $this->finish){
            $i = $this->finish;
            $result .= "<a href=" . $link->render(['page' => $i]) . "> " . $i . " </a>";
        }

        return $result;
    }




}

?>