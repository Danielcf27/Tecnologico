<?php
//controlador alumnos

class Alumnos extends Controller
{

    public function __construct()
    {
        $this->alumnoModel = $this->model('Alumno');
    }

    public function index($limite = 10, $pagina = 1)
    {
        $alumnos = $this->alumnoModel->listarAlumnos($limite, $pagina);
        $this->view('alumnos/index', $alumnos);
    }

    public function agregar()
    {
        $data = [
            'alumno_no_control'   => '',
            'alumno_nombre'       => '',
            'alumno_fotografia'   => '',
            'msg_error'           => '',
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //recomendacion de seguridad

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $alumno_fotografia = ($_FILES['alumno_fotografia']['size'] == 0) ? null : file_get_contents($_FILES['alumno_fotografia']['tmp_name']);
            $data = [
                'alumno_no_control'  => $_POST['alumno_no_control'],
                'alumno_nombre'      => $_POST['alumno_nombre'],
                'alumno_fotografia'  => $alumno_fotografia,
            ];
            #recomendacion    ---validar
            #datos vacios
            if (empty($data['alumno_no_control']) || empty($data['alumno_nombre'])) {
                $data['msg_error'] = 'Llene todos los campos requeridos';
            }

            if (empty($data['msg_error'])) {

                #llamar al modelo para insertar
                if ($this->alumnoModel->agregar($data)) {
                    //la llamada hay que pasar por controlador
                    redirigir('/alumnos');
                } else {
                    $data['msg_error'] = "Error inesperado....";
                }
            }
        } //fin de Post

        $this->view('alumnos/agregar', $data);
    }

    public function editar($id)
    {
        $data = [
            'msg_error'           => '',
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //recomendacion de seguridad

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $alumno_fotografia = ($_FILES['alumno_fotografia']['size'] == 0) ? null : file_get_contents($_FILES['alumno_fotografia']['tmp_name']);
            $data = [
                'id'                 => $id,
                'alumno_no_control'  => $_POST['alumno_no_control'],
                'alumno_nombre'      => $_POST['alumno_nombre'],
                'alumno_fotografia'  => $alumno_fotografia,
            ];

            if (empty($data['alumno_no_control']) || empty($data['alumno_nombre'])) {
                $data['msg_error'] = 'Llene todos los campos requeridos';
            }

            if (empty($data['msg_error'])) {

                #llamar al modelo para insertar
                if ($this->alumnoModel->actualizar($data)) {
                    //la llamada hay que pasar por controlador
                    redirigir('/alumnos');
                } else {
                    $data['msg_error'] = "Error inesperado....";
                }
            }
        } //fin de Post

        $alumno = $this->alumnoModel->editar($id);
        $data = [
            'id' => $alumno->id,
            'alumno_no_control' => $alumno->alumno_no_control,
            'alumno_nombre' => $alumno->alumno_nombre,
            'alumno_fotografia' => $alumno->alumno_fotografia,
        ];
        $this->view('alumnos/editar', $data);
    }

    public function borrar($id)
    {


        $this->alumnoModel->borrar($id);
        redirigir('/alumnos');
    }

//exportar a JSON
    public function json(){

        $alumnos= $this->alumnoModel->listarTodosAlumnos();
        $this->view('alumnos/json', $alumnos);

    }

}
