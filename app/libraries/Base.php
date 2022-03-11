<?php

//admin bd

class Base
{

    private $motor = DBMOTOR;
    private $server = DBSERVER;
    private $bd = DBNAME;
    private $user = DBUSER;
    private $pw = DBPW;

    //trabajar con PDO

    private $dbh; //bd handler
    private $stmt; //sentencias query
    private $error;

    public function __construct()
    {
        $dsn = $this->motor . ':host' . $this->server . ';dbname=' . $this->bd;
        $options = [

            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pw, $options);
        } catch (PDOException $e) {

            echo $this->error = 'Error = ' . $e->getMessage();
        };
    }

    public function query($sql)
    {

        $this->stmt = $this->dbh->prepare($sql);
    }

    public function bind($parametro, $valor, $tipo = null)
    {
        //valoracion del tipo
        switch (is_null($tipo)) {
            case is_int($valor):
                $tipo = PDO::PARAM_INT;
                break;
            case is_bool($valor):
                $tipo = PDO::PARAM_BOOL;
                break;
            case is_null($valor);
                $tipo = PDO::PARAM_NULL;
                break;
            default:
                $tipo = PDO::PARAM_STR;
        }
        $this->stmt->bindValue($parametro, $valor, $tipo);
    }

    public function ejecutar()
    {
        $this->stmt->ejecutar();
    }
    //para un unico registro
    public function unico()
    {

        $this->ejecutar();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    //multiples
    public function multiple()
    {

        $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function conteoReg()
    {

        return $this->stmt->rowCount();
    }
}
