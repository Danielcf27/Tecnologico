<?php
//controlador default

class Home extends Controller
{
    public function __construct()
    {
    }


    public function index()
    {
        //echo "estoy en home/index";
        $data = [
            'titulo' => 'inicio',
        ];
        $this->view('index', $data);
    }
}
