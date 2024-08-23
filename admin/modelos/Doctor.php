<?php

class Doctor
{
    private $conn;
    private $id;
    private $primerNombre;
    private $segundoNombre;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $fechaNacimiento;
    private $genero;
    private $telefono;
    private $email;
    private $cedula;
    private $especialidad;
    private $idEspecialidad;
    private $tipoDocumento;

    public function __construct($dbConnection)
    {
        $this->conn = $dbConnection;
    }

    // Métodos "getters" para acceder a los atributos privados
    public function getId()
    {
        return $this->id;
    }

    public function getPrimerNombre()
    {
        return $this->primerNombre;
    }

    public function getSegundoNombre()
    {
        return $this->segundoNombre;
    }

    public function getApellidoPaterno()
    {
        return $this->apellidoPaterno;
    }

    public function getApellidoMaterno()
    {
        return $this->apellidoMaterno;
    }

    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    public function getGenero()
    {
        return $this->genero;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getCedula()
    {
        return $this->cedula;
    }

    public function getEspecialidad()
    {
        return $this->especialidad;
    }

    public function getIdEspecialidad()
    {
        return $this->idEspecialidad;
    }

    public function getTipoDocumento(){
        return $this->tipoDocumento;
    }

    // Métodos "setters" para modificar los atributos privados
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setPrimerNombre($primerNombre)
    {
        $this->primerNombre = $primerNombre;
    }

    public function setSegundoNombre($segundoNombre)
    {
        $this->segundoNombre = $segundoNombre;
    }

    public function setApellidoPaterno($apellidoPaterno)
    {
        $this->apellidoPaterno = $apellidoPaterno;
    }

    public function setApellidoMaterno($apellidoMaterno)
    {
        $this->apellidoMaterno = $apellidoMaterno;
    }

    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }

    public function setEspecialidad($especialidad)
    {
        $this->especialidad = $especialidad;
    }

    public function setIdEspecialidad($idEspecialidad)
    {
        $this->idEspecialidad = $idEspecialidad;
    }

    public function setTipoDocumento($tipoDocumento){
        $this->tipoDocumento = $tipoDocumento;
    }

    public function consultarDoctores()
    {
        try {

            // Consulta SQL para seleccionar todos los pacientes de la tabla pacientes
            $consulta = "SELECT 
                            d.*, 
                            e.id as idEspecialidad, 
                            e.nombre as especialidad,
                            u.username
                        FROM 
                            doctores d JOIN especialidades e ON d.idEspecialidad = e.id
                            left JOIN usuarios u ON d.idUsuario = u.id";

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

    public function registrarDoctor()
    {
        try {
            $sql = "INSERT INTO doctores(primerNombre, segundoNombre, apellidoPaterno, apellidoMaterno, fechaNacimiento, genero, telefono, email, cedula,idEspecialidad,tipoDocumento) 
            VALUES (:primerNombre, :segundoNombre, :apellidoPaterno, :apellidoMaterno, :fechaNacimiento, :genero, :telefono, :email, :cedula, :idEspecialidad, :tipoDocumento)";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':primerNombre', $this->primerNombre);
            $stmt->bindParam(':segundoNombre', $this->segundoNombre);
            $stmt->bindParam(':apellidoPaterno', $this->apellidoPaterno);
            $stmt->bindParam(':apellidoMaterno', $this->apellidoMaterno);
            $stmt->bindParam(':fechaNacimiento', $this->fechaNacimiento);
            $stmt->bindParam(':genero', $this->genero);
            $stmt->bindParam(':telefono', $this->telefono);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':cedula', $this->cedula);
            $stmt->bindParam(':idEspecialidad', $this->idEspecialidad);
            $stmt->bindParam(':tipoDocumento', $this->tipoDocumento);

            $res = $stmt->execute();

            $this->id = $this->conn->lastInsertId();

            return $res;

        } catch (PDOException $e) {
            die("" . $e->getMessage());
        }
    }


    public function editarDoctor()
    {
        try {
            $sql = "UPDATE doctores SET primerNombre = :primerNombre, segundoNombre = :segundoNombre, apellidoPaterno = :apellidoPaterno, 
            apellidoMaterno = :apellidoMaterno, fechaNacimiento = :fechaNacimiento, genero = :genero, telefono = :telefono, 
            email = :email, idEspecialidad = :idEspecialidad, cedula = :cedula, tipoDocumento = :tipoDocumento WHERE id = :id";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':primerNombre', $this->primerNombre);
            $stmt->bindParam(':segundoNombre', $this->segundoNombre);
            $stmt->bindParam(':apellidoPaterno', $this->apellidoPaterno);
            $stmt->bindParam(':apellidoMaterno', $this->apellidoMaterno);
            $stmt->bindParam(':fechaNacimiento', $this->fechaNacimiento);
            $stmt->bindParam(':genero', $this->genero);
            $stmt->bindParam(':telefono', $this->telefono);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':cedula', $this->cedula);
            $stmt->bindParam(':idEspecialidad', $this->idEspecialidad);
            $stmt->bindParam(':tipoDocumento', $this->tipoDocumento);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        } catch (PDOException $e) {
            die("" . $e->getMessage());
        }
    }

    public function buscarDoctorId($id)
    {
        try {

            $sql = "SELECT d.*, e.id as idEspecialidad, e.nombre as especialidad FROM doctores d JOIN especialidades e ON d.idEspecialidad = e.id WHERE d.id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id);

            // Ejecutar la consulta
            $stmt->execute();

            // Obtener el primer registro que coincide con la cédula
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            die("" . $e->getMessage());
        }
    }

    public function eliminarDoctor($id)
    {
        try {
            $sql = "DELETE FROM doctores WHERE id = :id";
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

    public function agregarUsuario($idUsuario) {
        $sql = "UPDATE doctores SET idUsuario = :idUsuario WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':idUsuario', $idUsuario);

        // Ejecutar la consulta
        $stmt->execute();
    }
}
