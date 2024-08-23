<?php

include_once dirname(dirname(__FILE__)) . "/modelos/Receta.php";

class Historial
{
    private $conn;
    private $id;
    private $fechaAtencion;
    private $diagnostico;
    private $procedimiento;
    private $notas;
    private $idEspecialidad;
    private $idPaciente;
    private $recetas = [];

    public function __construct($dbConnection)
    {
        $this->conn = $dbConnection;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setFechaAtencion($fechaAtencion)
    {
        $this->fechaAtencion = $fechaAtencion;
    }

    public function setDiagnostico($diagnostico)
    {
        $this->diagnostico = $diagnostico;
    }

    public function setProcedimiento($procedimiento)
    {
        $this->procedimiento = $procedimiento;
    }

    public function setNotas($notas)
    {
        $this->notas = $notas;
    }

    public function setIdEspecialidad($idEspecialidad)
    {
        $this->idEspecialidad = $idEspecialidad;
    }

    public function setIdPaciente($idPaciente)
    {
        $this->idPaciente = $idPaciente;
    }

    public function setRecetas($recetas)
    {
        $this->recetas = $recetas;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFechaAtencion()
    {
        return $this->fechaAtencion;
    }

    public function getDiagnostico()
    {
        return $this->diagnostico;
    }

    public function getProcedimiento()
    {
        return $this->procedimiento;
    }

    public function getNotas()
    {
        return $this->notas;
    }

    public function getIdEspecialidad()
    {
        return $this->idEspecialidad;
    }

    public function getIdPaciente()
    {
        return $this->idPaciente;
    }

    public function getRecetas()
    {
        return $this->recetas;
    }

    public function buscarHistoriaPorId($idHistoria)
    {
        try {
            $sql = "SELECT * FROM historias where id=:id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $idHistoria);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function buscarHistoriaPorIdPaciente($idPaciente)
    {
        try {
            $sql = "SELECT 
                h.id,
                h.fechaAtencion,
                h.diagnostico,
                h.procedimiento,
                h.notas,
                h.idEspecialidad,
                h.idPaciente,
                e.nombre as especialidadNombre
            FROM pacientes p
            JOIN historias h ON p.id = h.idPaciente
            JOIN especialidades e ON h.idEspecialidad = e.id
            WHERE p.id = :idPaciente
            ORDER BY h.fechaAtencion desc";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":idPaciente", $idPaciente);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function registrarHistorial()
    {

        try {
            $sql = "INSERT INTO historias (idPaciente, fechaAtencion, idEspecialidad, diagnostico, procedimiento, notas)
            VALUES (:idPaciente, :fechaAtencion, :idEspecialidad, :diagnostico, :procedimiento, :notas)";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":idPaciente", $this->idPaciente);
            $stmt->bindParam(":fechaAtencion", $this->fechaAtencion);
            $stmt->bindParam(":idEspecialidad", $this->idEspecialidad);
            $stmt->bindParam(":diagnostico", $this->diagnostico);
            $stmt->bindParam(":procedimiento", $this->procedimiento);
            $stmt->bindParam(":notas", $this->notas);

            if ($stmt->execute()) {

                if (count($this->recetas) > 0) {

                    $this->id = $this->conn->lastInsertId();

                    foreach ($this->recetas as $receta) {
                        $recetaDAO = new Receta($this->conn);
                        $recetaDAO->setNombreMedicamento($receta[0]);
                        $recetaDAO->setIndicacionesMedicamento($receta[1]);
                        $recetaDAO->setIdHistoria($this->id);

                        $recetaDAO->registrarReceta();
                    }

                    return true;
                }

                return true;
            }

            return false;
        } catch (PDOException $e) {
            die("Error" . $e->getMessage());
        }
    }

    public function editarHistorial()
    {
        try {


            $sql = "UPDATE historias SET idPaciente = :idPaciente, fechaAtencion = :fechaAtencion, 
        idEspecialidad = :idEspecialidad, diagnostico = :diagnostico, 
        procedimiento = :procedimiento, notas = :notas WHERE id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":idPaciente", $this->idPaciente);
            $stmt->bindParam(":fechaAtencion", $this->fechaAtencion);
            $stmt->bindParam(":idEspecialidad", $this->idEspecialidad);
            $stmt->bindParam(":diagnostico", $this->diagnostico);
            $stmt->bindParam(":procedimiento", $this->procedimiento);
            $stmt->bindParam(":notas", $this->notas);
            $stmt->bindParam(":id", $this->id);

            if ($stmt->execute()) {

                $sql = "DELETE FROM recetas WHERE idHistoria = :idHistoria";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":idHistoria", $this->id);
                $stmt->execute();

                if (count($this->recetas) > 0) {

                    foreach ($this->recetas as $receta) {
                        $recetaDAO = new Receta($this->conn);
                        $recetaDAO->setNombreMedicamento($receta[0]);
                        $recetaDAO->setIndicacionesMedicamento($receta[1]);
                        $recetaDAO->setIdHistoria($this->id);
                        $recetaDAO->registrarReceta();
                    }
                    return true;
                }
                return true;
            }

            return false;
        } catch (PDOException $e) {
            die("Error" . $e->getMessage());
        }
    }

    public function eliminarHistoria($id)
    {
        try {
            $sql = "DELETE FROM historias WHERE id = :id";
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
