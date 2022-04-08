<?php

/**
 * 
 * 
 *  Modelo alumno
 * 
 */

class alumno
{

    private $db;
    public function __construct()
    {
        $this->db = new Base;
    }

    public function listarAlumnos($limite, $pagina)
    {

        $offset = ($pagina - 1) * $limite;
        $this->db->query('SELECT count(*) as registros From alumnos');
        $registros = $this->db->unico()->registros;
        $paginas = ceil($registros / $limite);

        $this->db->query("SELECT id, alumno_no_control, alumno_nombre, alumno_fotografia
                              FROM alumnos
                              LIMIT $offset , $limite
                                ");

        $data['alumnos'] = $this->db->multiple();
        $paginacion = [
            'limite' => $limite,
            'pagina' => $pagina,
            'paginas' => $paginas,
            'registros' => $registros,
            'pag_previa' => ($pagina - 1),
            'pag_siguiente' => ($pagina + 1),

        ];
        $data = array_merge($paginacion, $data);
        return $data;
    }

    public function agregar($data)
    {
        //query
        $this->db->query(' INSERT INTO alumnos (alumno_no_control, alumno_nombre, alumno_fotografia)
                           VALUES (:alumno_no_control, :alumno_nombre, :alumno_fotografia)         
                        ');
        //vinculacion
        $this->db->bind(':alumno_no_control', $data['alumno_no_control']);
        $this->db->bind(':alumno_nombre', $data['alumno_nombre']);
        $this->db->bind(':alumno_fotografia', $data['alumno_fotografia']);

        try {

            $this->db->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function editar($id)
    {
        //query

        $this->db->query('SELECT id, alumno_no_control, alumno_nombre, alumno_fotografia
            
                          FROM alumnos
                            
                          WHERE id = :id');
        //VINCULACION   
        $this->db->bind(':id', $id);

        //ejecucion de consulta
        try {

            return $this->db->unico();
        } catch (Exception $e) {
            return false;
        }
    }

    public function actualizar($data)
    {
        //query
        $this->db->query('UPDATE alumnos SET alumno_no_control = :alumno_no_control, 
                                              alumno_nombre = :alumno_nombre, alumno_fotografia = :alumno_fotografia
                            WHERE id= :id
                        ');
        //vinculacion
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':alumno_no_control', $data['alumno_no_control']);
        $this->db->bind(':alumno_nombre', $data['alumno_nombre']);
        $this->db->bind(':alumno_fotografia', $data['alumno_fotografia']);


        try {

            $this->db->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function borrar($id)
    {

        $this->db->query('DELETE FROM alumnos WHERE id=:id');

        $this->db->bind(':id', $id);


        try {

            return $this->db->unico();
        } catch (Exception $e) {
            return false;
        }
    }
}
