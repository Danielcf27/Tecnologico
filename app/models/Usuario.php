<?php

/**
 * 
 * 
 *  Modelo usuario
 * 
 */

class usuario
{

    private $db;
    public function __construct()
    {
        $this->db = new Base;
    }

    //metodo login

    public function login($usuario_id, $usuario_password)
    {
        //query
        $this->db->query('SELECT usuario_id, usuario_nombre, usuario_password, usuario_email
            
            FROM usuarios 
              
            WHERE usuario_id = :usuario_id');
        //vincular
        $this->db->bind(':usuario_id',$usuario_id);
        //ejecucion

        $usuario=$this->db->unico();
        if($this->db->conteoReg()>0){
            //validar password
            $hashedpassword= $usuario->usuario_password;
            if(password_verify($usuario_password,$hashedpassword)){
                return $usuario;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    //metodo encontrar

    public function encontrarUsuarioPorEmailOId($usuario_email, $usuario_id)
    {
        //query

        $this->db->query('SELECT usuario_id, usuario_email
            
                          FROM usuarios 
                            
                          WHERE usuario_id = :usuario_id OR usuario_email = :usuario_email');
        //VINCULACION   
        $this->db->bind(':usuario_id', $usuario_id);
        $this->db->bind(':usuario_email', $usuario_email);

        //ejecucion de consulta

        $this->db->unico();

        return ($this->db->conteoReg() > 0) ? true : false;
    } //fin encontrar 

    //registrar
    public function registrar($data)
    {
        //query
        $this->db->query(' INSERT INTO usuarios (usuario_id, usuario_nombre, usuario_password, usuario_email)
                           VALUES (:usuario_id, :usuario_nombre, :usuario_password, :usuario_email)         
                        ');
        //vinculacion
        $this->db->bind(':usuario_id', $data['usuario_id']);
        $this->db->bind(':usuario_nombre', $data['usuario_nombre']);
        $this->db->bind(':usuario_password', $data['usuario_password']);
        $this->db->bind(':usuario_email', $data['usuario_email']);

        try {

            $this->db->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    //ejecucion


}
