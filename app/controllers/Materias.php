<?php

class materias extends Controller
{

    function __construct()
    {
        $this->materiasModel = $this->model('Materia');
        $this->carrerasModel = $this->model('Carrera');///definicion
    }

    public function index($limite = 10, $pagina = 1)
    {
        $materias = $this->materiasModel->listarMaterias($limite, $pagina);
        $this->view('materias/index', $materias);
    }




    public function agregar()
    {
       
        $data = [
            'nombre'       => '',
            'cantidad_creditos' => '',
            'carrera' => '',
            'msg_error'           => '',
            'carreras' =>'',
        ];
        $data['carreras']=$this->carrerasModel->listarTodasCarreras();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //recomendacion de seguridad

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'nombre'      => $_POST['nombre'],
                'cantidad_creditos' => $_POST['cantidad_creditos'],
                'carrera' => $_POST['carrera']

            ];
            #recomendacion    ---validar
            #datos vacios
            if (empty($data['nombre']) || empty($data['cantidad_creditos']) || empty($data['carrera'])) {
                $data['msg_error'] = 'Llene todos los campos requeridos';
            }

            if (empty($data['msg_error'])) {

                #llamar al modelo para insertar
                if ($this->materiasModel->agregar($data)) {
                    //la llamada hay que pasar por controlador
                    redirigir('/materias/index');
                } else {
                    $data['msg_error'] = "Error inesperado....";
                }
            }
        } //fin de Post

        //else{
        //    $data=$this->carrerasModel->listarTodasCarreras();
      //  }

        $this->view('materias/agregar', $data);
    }

    
}
