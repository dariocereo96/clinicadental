<?php
include_once dirname(__DIR__) . "/config/ConexionDB.php";

class Paciente
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
    private $tipoDocumento;
    private $idUsuario;
    
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

    public function getTipoDocumento(){
        return $this->tipoDocumento;
    }

    public function getIdPaciente(){
        return $this->idUsuario;
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

    public function setTipoDocumento($tipoDocumento){
        $this->tipoDocumento = $tipoDocumento;
    }

    public function setIdUsuario($idUsuario){ 
        $this->idUsuario = $idUsuario;
    }

    public function consultarPacientes()
    {
        try {

            // Consulta SQL para seleccionar todos los pacientes de la tabla pacientes
            $consulta = "SELECT * FROM pacientes order by apellidoPaterno";

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

    public function registrarPaciente()
    {
        try {
            $sql = "INSERT INTO pacientes (idUsuario,primerNombre, segundoNombre, apellidoPaterno, apellidoMaterno, fechaNacimiento, genero, telefono, email, cedula, tipoDocumento) 
            VALUES (:idUsuario,:primerNombre, :segundoNombre, :apellidoPaterno, :apellidoMaterno, :fechaNacimiento, :genero, :telefono, :email, :cedula, :tipoDocumento)";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':idUsuario',$this->idUsuario);
            $stmt->bindParam(':primerNombre', $this->primerNombre);
            $stmt->bindParam(':segundoNombre', $this->segundoNombre);
            $stmt->bindParam(':apellidoPaterno', $this->apellidoPaterno);
            $stmt->bindParam(':apellidoMaterno', $this->apellidoMaterno);
            $stmt->bindParam(':fechaNacimiento', $this->fechaNacimiento);
            $stmt->bindParam(':genero', $this->genero);
            $stmt->bindParam(':telefono', $this->telefono);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':cedula', $this->cedula);
            $stmt->bindParam(':tipoDocumento', $this->tipoDocumento);

            if ($stmt->execute()) 
            {
                $this->id = $this->conn->lastInsertId();
                return true;
                exit();
            }
            return false;
        } catch (PDOException $e) {
            die("" . $e->getMessage());
        }
    }

    public function editarPaciente()
    {
        try {
            $sql = "UPDATE pacientes SET primerNombre = :primerNombre, 
            segundoNombre = :segundoNombre, 
            apellidoPaterno = :apellidoPaterno, 
            apellidoMaterno = :apellidoMaterno, 
            fechaNacimiento = :fechaNacimiento, 
            genero = :genero, 
            telefono = :telefono, 
            email = :email, 
            cedula = :cedula,
            tipoDocumento = :tipoDocumento
            WHERE id = :id";

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
            $stmt->bindParam(':tipoDocumento', $this->tipoDocumento);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        } catch (PDOException $e) {
            die("" . $e->getMessage());
        }
    }


    public function buscarPacienteCedula($cedula)
    {
        try {

            $sql = "select * from pacientes where cedula = :cedula";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":cedula", $cedula);

            // Ejecutar la consulta
            $stmt->execute();

            // Obtener el primer registro que coincide con la cédula
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            die("" . $e->getMessage());
        }
    }

    public function buscarPacienteId($id)
    {
        try {

            $sql = "select * from pacientes where id = :id";
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

    public function eliminarPaciente($id)
    {
        try {
            $sql = "DELETE FROM pacientes WHERE id = :id";
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

    public function totales()
    {
        $tablaTotales = array();

        try {
            //contar tabla pacientes
            $sql1 = "SELECT COUNT(*) as totalPacientes FROM pacientes";
            $stmt1 = $this->conn->prepare($sql1);
            $stmt1->execute();
            $result1 = $stmt1->fetch(PDO::FETCH_ASSOC);
            $tablaTotales["totalPacientes"] = $result1["totalPacientes"];

            //contar tablas citas
            $sql2 = "SELECT COUNT(*) as totalCitas FROM citas";
            $stmt2 = $this->conn->prepare($sql2);
            $stmt2->execute();
            $result2 = $stmt2->fetch(PDO::FETCH_ASSOC);
            $tablaTotales["totalCitas"] = $result2["totalCitas"];

            //contar tablas citas atendidas
            $sql3 = "SELECT COUNT(*) as totalAtendidas FROM citas where estadoCita=1";
            $stmt3 = $this->conn->prepare($sql3);
            $stmt3->execute();
            $result3 = $stmt3->fetch(PDO::FETCH_ASSOC);
            $tablaTotales["totalAtendidas"] = $result3["totalAtendidas"];

            //contar tablas citas atendidas
            $sql4 = "SELECT COUNT(*) as totalNoAtendidas FROM citas where estadoCita=0";
            $stmt4 = $this->conn->prepare($sql4);
            $stmt4->execute();
            $result4 = $stmt4->fetch(PDO::FETCH_ASSOC);
            $tablaTotales["totalNoAtendidas"] = $result4["totalNoAtendidas"];

            return $tablaTotales;
        } catch (PDOException $e) {
            die("" . $e->getMessage());
        }
    }

    public function totales2($idPaciente)
    {
        $tablaTotales = array();

        try {
            //contar tabla pacientes
            $sql1 = "SELECT COUNT(*) as totalPacientes FROM pacientes where id=$idPaciente";
            $stmt1 = $this->conn->prepare($sql1);
            $stmt1->execute();
            $result1 = $stmt1->fetch(PDO::FETCH_ASSOC);
            $tablaTotales["totalPacientes"] = $result1["totalPacientes"];

            //contar tablas citas
            $sql2 = "SELECT COUNT(*) as totalCitas FROM citas where idPaciente=$idPaciente";
            $stmt2 = $this->conn->prepare($sql2);
            $stmt2->execute();
            $result2 = $stmt2->fetch(PDO::FETCH_ASSOC);
            $tablaTotales["totalCitas"] = $result2["totalCitas"];

            //contar tablas citas atendidas
            $sql3 = "SELECT COUNT(*) as totalAtendidas FROM citas where estadoCita=1 AND idPaciente=$idPaciente";
            $stmt3 = $this->conn->prepare($sql3);
            $stmt3->execute();
            $result3 = $stmt3->fetch(PDO::FETCH_ASSOC);
            $tablaTotales["totalAtendidas"] = $result3["totalAtendidas"];

            //contar tablas citas atendidas
            $sql4 = "SELECT COUNT(*) as totalNoAtendidas FROM citas where estadoCita=0 AND idPaciente=$idPaciente";
            $stmt4 = $this->conn->prepare($sql4);
            $stmt4->execute();
            $result4 = $stmt4->fetch(PDO::FETCH_ASSOC);
            $tablaTotales["totalNoAtendidas"] = $result4["totalNoAtendidas"];

            return $tablaTotales;
        } catch (PDOException $e) {
            die("" . $e->getMessage());
        }
    }

}
