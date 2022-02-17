<?php
/**
 * 
 * 
 * Rutas amigables
 * 
 */

class Ruta{

    protected $controladorActual = 'Home';
    protected $metodoActual = 'index';
    protected $parametros = [];

    public function __construct()
    {
        $url= $this -> getUrl();
        if  ($url != null){
            if(file_exists(APPROOT.'/controllers/'.ucwords($url[0]))){
                $this -> controladorActual = ucwords($url[0]);
            }
        } 
    
        unset($url[0]);
    
        include_once APPROOT.'/controllers./'.ucwords($urls[0]).'php';

        $this -> controladorActual = new $this->controladorActual;

        if (isset($url[1])){
            if(method_exists($this ->controladorActual, $url[1])){
                $this -> metodoActual = $url[1];
            }
            unset($url[0]);
        }

        $this -> parametros = ($url) ? array_values($url) : [];
        call_user_func_array([$this ->controladorActual, $this-> metodoActual], $this -> parametros);


    }


    public function getUrl(){

        if (isset($_GET['url'])){

            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }



    }
}