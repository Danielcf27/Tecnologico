<?php

class Carreras extends Controller
{

    function __construct()
    {
        $this->carreraModel = $this->model('carrera');
    }

    public function index($limite = 10, $pagina = 1)
    {
        $carreras = $this->carreraModel->listarCarreras($limite, $pagina);
        $this->view('carreras/index', $carreras);
    }

    function agregar()
    {
        $data = [
            'nombre'       => '',
            'msg_error'           => '',
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //recomendacion de seguridad

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'nombre'      => $_POST['nombre'],
            ];
            #recomendacion    ---validar
            #datos vacios
            if (empty($data['nombre'])) {
                $data['msg_error'] = 'Llene todos los campos requeridos';
            }

            if (empty($data['msg_error'])) {

                #llamar al modelo para insertar
                if ($this->carreraModel->agregar($data)) {
                    //la llamada hay que pasar por controlador
                    redirigir('/carreras/agregar');
                } else {
                    $data['msg_error'] = "Error inesperado....";
                }
            }
        } //fin de Post

        $this->view('carreras/agregar', $data);
    } //fin agregar

    public function listarTodasCarreras(){
            $carreras = new carrera();
            $lista = $carreras -> listarTodasCarreras();
            $data['lista'] = $lista;

    $this -> view -> show('materia/agregar', $data);
    }

}//final de clase
