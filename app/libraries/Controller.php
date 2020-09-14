<?php
/*
 * Base Controller
 * Loads the models ans views
 */

class Controller {
     //Load model
    public function model($model) {
        // Require model file
        require_once '../app/models/' . $model . '.php';

        // Instatialize model
        return new $model();
    }
    
    // Load view
    public function view($view, $data = []){
        // Check for view existence
        if(file_exists('../app/views/' . $view . '.php')){
            // Load view
            require_once '../app/views/' . $view . '.php';
        }else{
            die('View does not exist');
        }
    }
}