<?php

class Receta
{
    private $conn;
    private $id;
    private $nombreMedicamento;
    private $indicacionesMedicamento;
    private $idHistoria;

    public function __construct($dbConnection)
    {
        $this->conn = $dbConnection;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombreMedicamento()
    {
        return $this->nombreMedicamento;
    }

    public function getIndicacionesMedicamento()
    {
        return $this->indicacionesMedicamento;
    }

    public function getIdHistoria()
    {
        return $this->idHistoria;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombreMedicamento($nombreMedicamento)
    {
        $this->nombreMedicamento = $nombreMedicamento;
    }

    public function setIndicacionesMedicamento($indicacionesMedicamento)
    {
        $this->indicacionesMedicamento = $indicacionesMedicamento;
    }

    public function setIdHistoria($idHistoria)
    {
        $this->idHistoria = $idHistoria;
    }

    public function registrarReceta()
    {
        try {
            $sql = "INSERT INTO recetas(nombreMedicamento, indicacionesMedicamento, idHistoria) 
            VALUES (:nombreMedicamento, :indicacionesMedicamento, :idHistoria)";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':nombreMedicamento', $this->nombreMedicamento);
            $stmt->bindParam(':indicacionesMedicamento', $this->indicacionesMedicamento);
            $stmt->bindParam('idHistoria', $this->idHistoria);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        } catch (PDOException $e) {
            die("" . $e->getMessage());
        }
    }

    public function editarReceta()
    {
        try {
            $sql = "UPDATE recetas SET nombreMedicamento = :nombreMedicamento, indicacionesMedicamento = :indicacionesMedicamento WHERE id = :id";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':nombreMedicamento', $this->nombreMedicamento);
            $stmt->bindParam(':indicacionesMedicamento', $this->indicacionesMedicamento);
            $stmt->bindParam('id', $this->id);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        } catch (PDOException $e) {
            die("" . $e->getMessage());
        }
    }

    public function consultarRecetaPorIdHistoria($idHistoria)
    {
        try {

            $sql = "SELECT * from recetas where idHistoria = :idHistoria";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":idHistoria", $idHistoria);
            // Ejecutar la consulta
            $stmt->execute();

            // Obtener los registros
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            die("" . $e->getMessage());
        }
    }
}
