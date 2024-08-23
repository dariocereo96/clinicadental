<?php
class ConexionBD
{
    private $host;
    private $base_de_datos;
    private $usuario;
    private $contrasena;
    private $conexion;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->base_de_datos = 'clinica';
        $this->usuario = 'root';
        $this->contrasena = '';
    }

    public function conectar()
    {
        try {
            $this->conexion = new PDO("mysql:host=$this->host;dbname=$this->base_de_datos", $this->usuario, $this->contrasena);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conexion;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function desconectar()
    {
        $this->conexion = null;
    }
}
