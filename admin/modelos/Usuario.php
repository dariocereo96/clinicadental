<?php

include_once dirname(__DIR__) . "/config/ConexionDB.php";

class Usuario
{
    private $conn;
    private $id;
    private $username;
    private $password;
    private $rol;

    public function __construct($dbConnection)
    {
        $this->conn = $dbConnection;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    public function verificarUsuario($username, $password)
    {
        try {

            // Preparar la consulta
            $query =    "select 
                            u.*,
                            p.id as idPaciente,
                            d.id as idDoctor,
                            CONCAT(d.primerNombre,' ',d.apellidoPaterno) as nombreDoctor,
                            CONCAT(p.primerNOMBRE,' ',p.segundoNombre,' ',p.apellidoPaterno,' ',p.apellidoMaterno) as nombrePaciente
                        from 
                            usuarios u left join pacientes p on u.id = p.idUsuario
                            left join doctores d on u.id = d.idUsuario";
            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($usuarios as $usuario) {
                if ($usuario['username'] == $username && $usuario['password'] == $password) {
                    return $usuario;
                }
            }

            return null;
        } catch (PDOException $e) {
            // Manejar errores de conexión
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function registrarUsuario()
    {

        try {
            $sql = "INSERT INTO usuarios (username, password, rol) VALUES (:username, :password, :rol)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':rol', $this->rol);

            $resp = $stmt->execute();

            $this->id = $this->conn->lastInsertId();

            return $resp;

        } catch (Exception $e) {
            // Manejar errores de conexión
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function editarUsuario()
    {
        try {
            $sql = "UPDATE usuarios SET username = :username, password = :password, rol = :rol 
            WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':rol', $this->rol);
            $stmt->bindParam(':id', $this->id);

            return $stmt->execute();
        } catch (Exception $e) {
            // Manejar errores de conexión
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function consultarUsuarios()
    {
        try {
            //Consulta SQL para seleccionar todos los usuarios
            $sql = "SELECT * FROM usuarios";

            //Preparar la consulta
            $stmt = $this->conn->prepare($sql);

            //Ejecutar la consulta
            $stmt->execute();

            //Obtener todos los pacientes como un arreglo asociativo
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $resultados;
        } catch (Exception $e) {
            // Manejar errores de conexión
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function eliminarUsuario($id)
    {
        try {
            $sql = "DELETE FROM usuarios WHERE id = :id";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            return $stmt->execute();
        } catch (PDOException $e) {
            die("" . $e->getMessage());
        }
    }

    public function buscarUsuarioId($id)
    {
        try {
            $sql = "select * from usuarios where id = :id";
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
}
