<?php

//controlador maestro
//llamar vistas y/o modelos

class Controller{

    public function __construct()
    {
        
    }
    
    public function view($view, $data=[]){

        if (file_exists(APPROOT.'/views/'.$view.'.php'))

        require_once APPROOT.'/views/'.$view.'.php';

        else

            die('la vista no se encontró');
        

    }

    public function model($model){
        if (file_exists(APPROOT.'/models/'.ucwords($model).'.php')){
             require_once APPROOT.'/models/'.ucwords($model).'.php';
             
             return new $model();

        }


    }

}