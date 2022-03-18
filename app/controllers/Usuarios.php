<?php

class Usuarios extends Controller
{

    public function __construct()
    {
        $this->usuarioModel = $this->model('Usuario');
    }

    public function index()
    {
        $this->view('/construccion');
    }

    public function login()
    {

        $data = [
            'usuario_id'          => '',
            'usuario_password'    => '',
            'msg_error'           => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'usuario_id'          => $_POST['usuario_id'],
                'usuario_nombre'      => $_POST['usuario_nombre'],
                'usuario_password'    => $_POST['usuario_password'],
            ];

            if (empty($data['usuario_id']) || empty($data['usuario_password'])) {

                $data['msg_error'] = 'Llene los campos requeridos';
            }

            if (empty($data['msg_error'])) {
                $logueado = $this->usuarioModel->login($data['usuario_id'], $data['usuario_password']);

                if ($logueado) {
                    $_SESSION['usuario_id']=$logueado->usuario_id;
                    $_SESSION['usuario_nombre']=$logueado->usuario_nombre;
                    $_SESSION['usuario_email']=$logueado->usuario_email;
                    redirigir('/index');

                } else {

                    $data['msg_error'] = 'El usuario/password no existe';
                }
            }
        }

        $this->view('usuarios/login', $data);
    }

    public function registrar()
    {
        $data = [
            'usuario_id'          => '',
            'usuario_nombre'      => '',
            'usuario_password'    => '',
            'usuario_email'       => '',
            'msg_error'           => '',
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //recomendacion de seguridad

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'usuario_id'          => $_POST['usuario_id'],
                'usuario_nombre'      => $_POST['usuario_nombre'],
                'usuario_password'    => $_POST['usuario_password'],
                'conf_password'       => $_POST['conf_password'],
                'usuario_email'       => $_POST['usuario_email'],
            ];
            #recomendacion    ---validar
            #datos vacios
            if (empty($data['usuario_id']) || empty($data['usuario_nombre']) || empty($data['usuario_password']) || empty($data['conf_password']) || empty($data['usuario_email'])) {
                $data['msg_error'] = 'Llene todos los campos requeridos';
            }

            #validar que sean iguales los password
            if ($data['usuario_password'] != $data['conf_password']) {
                $data['msg_error'] = 'Los valores de Password no coinciden';
            }
            
            #validar el formato del correo
            if (!filter_var($data['usuario_email'], FILTER_VALIDATE_EMAIL)) {
                $data['msg_error'] = 'El correo no es valido';
            }

            #validar la existencia de usuario y/o correo
            if ($this->usuarioModel->encontrarUsuarioPorEmailOId($data['usuario_email'], $data['usuario_id'])) {
                $data['msg_error'] = 'El usuario y/o correo ya esta registrado';
            }

            /** aqui iran validaciones posteriores si se requiere */

            if (empty($data['msg_error'])) {

                $data['usuario_password'] = password_hash($data['usuario_password'], PASSWORD_DEFAULT);
                #llamar al modelo para insertar
                if ($this->usuarioModel->registrar($data)) {
                    //la llamada hay que pasar por controlador
                    redirigir('/usuarios/login');
                } else {
                    $data['msg_error'] = "Error inesperado....";
                }
            }
        } //fin de Post

        $this->view('usuarios/registrar', $data);
    }
}
