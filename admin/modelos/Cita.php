<?php

class Cita
{
    private $conn;
    private $idCita;
    private $idPaciente;
    private $idDoctor;
    private $fechaCita;
    private $horaInicio;
    private $horaFin;
    private $motivoCita;
    private $estadoCita=0;
    private $idEspecialidad;

    public function __construct($dbConnection)
    {
        $this->conn = $dbConnection;
    }

    // Getters y Setters para cada propiedad
    public function getIdCita()
    {
        return $this->idCita;
    }

    public function setIdCita($idCita)
    {
        $this->idCita = $idCita;
    }

    public function getIdPaciente()
    {
        return $this->idPaciente;
    }

    public function setIdPaciente($idPaciente)
    {
        $this->idPaciente = $idPaciente;
    }

    public function getIdDoctor()
    {
        return $this->idDoctor;
    }

    public function setIdDoctor($idDoctor)
    {
        $this->idDoctor = $idDoctor;
    }

    public function getFechaCita()
    {
        return $this->fechaCita;
    }

    public function setFechaCita($fechaCita)
    {
        $this->fechaCita = $fechaCita;
    }

    public function getHoraInicio()
    {
        return $this->horaInicio;
    }

    public function setHoraInicio($horaInicio)
    {
        $this->horaInicio = $horaInicio;
    }

    public function getHoraFin()
    {
        return $this->horaFin;
    }

    public function setHoraFin($horaFin)
    {
        $this->horaFin = $horaFin;
    }

    public function getMotivoCita()
    {
        return $this->motivoCita;
    }

    public function setMotivoCita($motivoCita)
    {
        $this->motivoCita = $motivoCita;
    }

    public function getEstadoCita()
    {
        return $this->estadoCita;
    }

    public function setEstadoCita($estadoCita)
    {
        $this->estadoCita = $estadoCita;
    }

    public function registrarCita()
    {
        try {

            $sql = "INSERT INTO citas (idPaciente, idDoctor, fechaCita, horaInicio, horaFin, motivoCita,idEspecialidad) 
                    VALUES (:idPaciente, :idDoctor, :fechaCita, :horaInicio, :horaFin, :motivoCita, :idEspecialidad)";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idPaciente', $this->idPaciente);
            $stmt->bindParam(':idDoctor', $this->idDoctor);
            $stmt->bindParam(':fechaCita', $this->fechaCita);
            $stmt->bindParam(':horaInicio', $this->horaInicio);
            $stmt->bindParam(':horaFin', $this->horaFin);
            $stmt->bindParam(':motivoCita', $this->motivoCita);
            $stmt->bindParam(':idEspecialidad',$this->idEspecialidad);

            return $stmt->execute();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function buscarCitaId($idCita)
    {
        try {

            $sql = "SELECT 
                        c.*,
                        CONCAT(p.primerNombre,' ',p.segundoNombre,' ',p.apellidoPaterno,' ',p.apellidoMaterno) as paciente
                    FROM 
                        citas c join pacientes p on c.idPaciente = p.id
                    WHERE 
                        idCita = :idCita";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idCita', $idCita);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function editarCita()
    {
        try {
            $sql = "UPDATE citas
                    SET idPaciente = :idPaciente, idDoctor = :idDoctor, fechaCita = :fechaCita, 
                        horaInicio = :horaInicio, horaFin = :horaFin, motivoCita = :motivoCita, idEspecialidad = :idEspecialidad
                    WHERE idCita = :idCita";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idCita', $this->idCita);
            $stmt->bindParam(':idPaciente', $this->idPaciente);
            $stmt->bindParam(':idDoctor', $this->idDoctor);
            $stmt->bindParam(':fechaCita', $this->fechaCita);
            $stmt->bindParam(':horaInicio', $this->horaInicio);
            $stmt->bindParam(':horaFin', $this->horaFin);
            $stmt->bindParam(':motivoCita', $this->motivoCita);
            $stmt->bindParam(':idEspecialidad', $this->idEspecialidad);

            return $stmt->execute();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function eliminarCita($idCita)
    {
        try {

            $sql = "DELETE FROM citas WHERE idCita = :idCita";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idCita', $idCita);

            return $stmt->execute();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function consultarCitas()
    {
        try {

            // Consulta SQL para seleccionar todas las citas
            $consulta = "select * from citas";

            // Preparar la consulta
            $stmt = $this->conn->prepare($consulta);

            // Ejecutar la consulta
            $stmt->execute();

            // Obtener todas las citas como un arreglo asociativo
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $resultados;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function buscarCitaPorIdPaciente($idPaciente)
    {
        try {
            $sql = "SELECT c.*,
                            CONCAT(d.primerNombre, ' ', d.apellidoPaterno) AS doctor,
                            CONCAT(p.primerNombre, ' ', p.apellidoPaterno) AS paciente,
                            e.nombre AS nombreEspecialidad,
                            p.cedula
                    FROM 
                        citas c
                    JOIN 
                        pacientes p ON c.idPaciente = p.id 
                    JOIN 
                        doctores d ON c.idDoctor = d.id
                    JOIN
                        especialidades e ON  c.idEspecialidad = e.id
                    where 
                        c.idPaciente = :idPaciente
                    order 
                        by c.fechaCita desc,c.horaInicio asc";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":idPaciente", $idPaciente);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function buscarCitaPorAprobar()
    {
        try {
            $sql = "select 
                        c.*,
                        CONCAT(d.primerNombre,' ',d.apellidoPaterno) as doctor,
                        CONCAT(p.primerNombre,' ',p.apellidoPaterno) as paciente,
                        e.nombre AS nombreEspecialidad,
                        p.cedula
                    from citas 
                        c join pacientes p on c.idPaciente = p.id 
                        join doctores d ON c.idDoctor = d.id 
                        join especialidades e ON  c.idEspecialidad = e.id
                    order 
                        by c.fechaCita desc,c.horaInicio desc";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function buscarCitaDelDoctor($id)
    {
        try {
            $sql = "select 
                        c.*,
                        CONCAT(d.primerNombre,' ',d.apellidoPaterno) as doctor,
                        CONCAT(p.primerNombre,' ',p.apellidoPaterno) as paciente,
                        e.nombre AS nombreEspecialidad,
                        p.cedula
                    from 
                        citas c join pacientes p on c.idPaciente = p.id 
                        join doctores d ON c.idDoctor = d.id
                        join especialidades e ON  c.idEspecialidad = e.id
                    where
                        c.idDoctor = $id
                    order by 
                        c.fechaCita desc,c.horaInicio desc";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }


    public function marcarCitaRealizada($idCita)
    {
        try {
            $sql = "UPDATE citas
            SET estadoCita = 1
            WHERE idCita = :idCita";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idCita', $idCita);
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function rechazarCitaRealizada($idCita)
    {
        try {
            $sql = "UPDATE citas
            SET estadoCita = 3
            WHERE idCita = :idCita";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idCita', $idCita);
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function registrarPacienteCita(
        $cedula,
        $nombre,
        $apellido,
        $genero,
        $fechaNacimiento,
        $telefono,
        $correo,
        $idEspecialidad,
        $fechaCita,
        $horaCita,
        $idDoctor,
        $motivoCita
    ) {

        try {

            // Eliminar espacios en blanco del inicio y el final del nombre
            $nombre = trim($nombre);
            $apellido = trim($apellido);

            // Separar el nombre completo en primer nombre y segundo nombre
            $nombreArray = explode(' ', $nombre);
            $primerNombre = isset($nombreArray[0]) ? $nombreArray[0] : '';
            $segundoNombre = isset($nombreArray[1]) ? $nombreArray[1] : '';

            // Separar el nombre completo en primer nombre y segundo nombre
            $nombreArray2 = explode(' ', $apellido);
            $apellidoPaterno = isset($nombreArray2[0]) ? $nombreArray2[0] : '';
            $apellidoMaterno = isset($nombreArray2[1]) ? $nombreArray2[1] : '';

            $sql = "INSERT INTO pacientes (idUsuario,primerNombre, segundoNombre, apellidoPaterno, apellidoMaterno, fechaNacimiento, genero, telefono, email, cedula, tipoDocumento) 
            VALUES (:idUsuario,:primerNombre, :segundoNombre, :apellidoPaterno, :apellidoMaterno, :fechaNacimiento, :genero, :telefono, :email, :cedula, :tipoDocumento)";
            $stmt = $this->conn->prepare($sql);

            $idUsuario = null;
            $cedula2 = "cedula";

            $stmt->bindParam(":idUsuario", $idUsuario);
            $stmt->bindParam(':primerNombre', $primerNombre);
            $stmt->bindParam(':segundoNombre', $segundoNombre);
            $stmt->bindParam(':apellidoPaterno', $apellidoPaterno);
            $stmt->bindParam(':apellidoMaterno', $apellidoMaterno);
            $stmt->bindParam(':fechaNacimiento', $fechaNacimiento);
            $stmt->bindParam(':genero', $genero);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':email', $correo);
            $stmt->bindParam(':cedula', $cedula);
            $stmt->bindParam(':tipoDocumento', $cedula2);

            if ($stmt->execute()) {

                $idPaciente = $this->conn->lastInsertId();

                $sql = "INSERT INTO citas (idPaciente, idDoctor, fechaCita, horaInicio, horaFin, motivoCita,idEspecialidad,estadoCita) 
                VALUES (:idPaciente, :idDoctor, :fechaCita, :horaInicio, :horaFin, :motivoCita,:idEspecialidad,:estadoCita)";

                list($horaInicio, $horaFin) = explode('-', $horaCita);

                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':idPaciente', $idPaciente);
                $stmt->bindParam(':idDoctor', $idDoctor);
                $stmt->bindParam(':fechaCita', $fechaCita);
                $stmt->bindParam(':horaInicio', $horaInicio);
                $stmt->bindParam(':horaFin', $horaFin);
                $stmt->bindParam(':motivoCita', $motivoCita);
                $stmt->bindParam(':idEspecialidad', $idEspecialidad);
                $stmt->bindParam(':estadoCita', $this->estadoCita);

                return $stmt->execute();
            }
        } catch (Exception $e) {
            die("" . $e->getMessage());
        }
    }

    /**
     * Get the value of idEspecialidad
     */ 
    public function getIdEspecialidad()
    {
        return $this->idEspecialidad;
    }

    /**
     * Set the value of idEspecialidad
     *
     * @return  self
     */ 
    public function setIdEspecialidad($idEspecialidad)
    {
        $this->idEspecialidad = $idEspecialidad;

        return $this;
    }
}
