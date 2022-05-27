<?php 

class materia{

    private $db;
    public function __construct()
    {
        $this->db = new Base;
    }

    public function agregar($data)
    {
        //query
        $this->db->query(' INSERT INTO materias (nombre, cantidad_creditos, carrera)
                           VALUES (:nombre, :cantidad_creditos, :carrera)         
                        ');
        //vinculacion
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':cantidad_creditos', $data['cantidad_creditos']);
        $this->db->bind(':carrera', $data['carrera']);

        try {

            $this->db->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function listarMaterias($limite, $pagina)
    {

        $offset = ($pagina - 1) * $limite;
        $this->db->query('SELECT count(*) as registros From materias');
        $registros = $this->db->unico()->registros;
        $paginas = ceil($registros / $limite);

        $this->db->query("SELECT nombre, cantidad_creditos, carrera
                              FROM materias
                              LIMIT $offset , $limite
                                ");

        $data['materias'] = $this->db->multiple();
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
}