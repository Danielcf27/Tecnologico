<?php

class Usuarios extends Controller{

    public function __construct()
    {
        $this->usuarioModel = $this-> model('Usuario');
    }

    public function registrar(){

        $data = [

            'usuario_id'         =>     '',
            'usuario_nombre'     =>     '',
            'usuario_password'   =>     '',
            'usuario_email'      =>     '',
            'msg_error'          =>     '',

        ];
    
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [

                'usuario_id'         =>     $_POST['usuario_id'],
                'usuario_nombre'     =>     $_POST['usuario_nombre'],
                'usuario_password'   =>     $_POST['usuario_password'],
                'conf_password'      =>     $_POST['conf_password'],
                'usuario_email'      =>     $_POST['usuario_email'],
                
    
            ];
        if (empty($data['usuario_id']) || empty($data['usuario_nombre']) ||empty($data['usuario_password']) ||empty($data['conf_password']) || empty($data['usuario_email'])){

            $data['msg_error']= "Llene todos los campos requeridos";

        }
        if($data['usuario_password' != $data['conf_password']]){
            $data['msg_error']="Los valores de password no coinciden";

        }
        if(!filter_var($data['usuario_email'],FILTER_VALIDATE_EMAIL))
                $data['usuarios_email']= "EL Correo no es valido";

        }
        if($this-> usuarioModel -> data){}

        if(empty($data['msg_error'])){
            
        }else{

            $data['msg_error']="Error inesperado";
        }

        $this -> view('usuarios/registrar', $data);
 
    }


}