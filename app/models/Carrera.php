<?php

/**
 * 
 * 
 *  Modelo carrera
 * 
 */

class carrera
{

    private $db;
    public function __construct()
    {
        $this->db = new Base;
    }

    public function listarCarreras($limite, $pagina)
    {

        $offset = ($pagina - 1) * $limite;
        $this->db->query('SELECT count(*) as registros From carreras');
        $registros = $this->db->unico()->registros;
        $paginas = ceil($registros / $limite);

        $this->db->query("SELECT carrera_id, nombre
                              FROM carreras
                              LIMIT $offset , $limite
                                ");

        $data['carreras'] = $this->db->multiple();
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
        $this->db->query(' INSERT INTO carreras (nombre)
                           VALUES (:nombre)         
                        ');
        //vinculacion
        $this->db->bind(':nombre', $data['nombre']);

        try {

            $this->db->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function listarTodasCarreras()
    {

        $this->db->query('SELECT carrera_id,nombre FROM carreras');

        $data = $this->db->multiple();
        return $data;
    }
   
}
