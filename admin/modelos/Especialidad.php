<?php
class Especialidad
{
    private $conn;
    private $id;
    private $nombre;
    private $descripcion;
    private $precio;

    public function __construct($dbConnection)
    {
        $this->conn = $dbConnection;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function consultarEspecialidades()
    {
        try {

            // Consulta SQL para seleccionar todos los tratamientos de la tabla
            $consulta = "SELECT * FROM especialidades";

            // Preparar la consulta
            $stmt = $this->conn->prepare($consulta);

            // Ejecutar la consulta
            $stmt->execute();

            // Obtener todos los pacientes como un arreglo asociativo
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $resultados;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function registrarEspecialidad()
    {
        try {
            $sql = "INSERT INTO especialidades (nombre, descripcion) 
                VALUES (:nombre, :descripcion)";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':descripcion', $this->descripcion);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        } catch (PDOException $e) {
            die("" . $e->getMessage());
        }
    }

    public function buscarEspecialidadId($id)
    {
        try {

            $sql = "select * from especialidades where id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id);

            // Ejecutar la consulta
            $stmt->execute();

            // Obtener el primer registro que coincide con la especialidad
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            die("" . $e->getMessage());
        }
    }

    public function editarEspecialidad()
    {
        try {
            $sql = "UPDATE especialidades SET nombre = :nombre, descripcion = :descripcion WHERE id = :id";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':descripcion', $this->descripcion);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        } catch (PDOException $e) {
            die("" . $e->getMessage());
        }
    }

    public function eliminarEspecialidad($id)
    {
        try {
            $sql = "DELETE FROM especialidades WHERE id = :id";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                return true; // El registro se eliminó con éxito.
            }

            return false; // Ocurrió un error al eliminar el registro.
        } catch (PDOException $e) {
            die("" . $e->getMessage());
        }
    }
}
