<?php

class Controller {
    public function model($model) {
        require_once "../EasyMVC_/models/$model.php";
        return new $model ();
    }
    
    public function view($view, $data = Array()) {
        require_once "../EasyMVC_/views/$view.php";
    }
}

?>