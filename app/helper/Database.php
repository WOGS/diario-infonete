<?php

class Database{

    private $conexion;

    public function __construct(){
        $configuracion = parse_ini_file("config/config.ini");
        $servername = $configuracion["servername"];
        $username = $configuracion["username"];
        $dbname =  $configuracion["dbname"];
        $password =  $configuracion["password"];

        $conn = new mysqli($servername, $username, $password);

        if ($conn->connect_error) {
            die("Fallo la conexion: " . $conn->connect_error);
        }
        echo "Conexion Correcta<br>";
        $conn->select_db($dbname);
        $this->conexion = $conn;
    }

    public function query($usuario,$clave){
        $stmt = $this->conexion->prepare("SELECT * FROM Usuario WHERE Nombre = ? and Pass = ?");
        $stmt->bind_param('ss', $usuario, $clave);

        // set parameters and execute
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows === 0) {
            $_SESSION["loginError"] = "error";
           // header("Location: index.php");
        }

        while($row = $result->fetch_assoc()) {
            $resultado = $row['Nro_doc']."-".$row['Nombre'];
        }
        // se guarda el usuario recuperado de la consulta en SESSION
        $_SESSION["usuarioOK"] = $resultado;
        //header("Location: interno.php");
        $stmt->close();
        $this->conexion->close();
    }

    public function queryInsert($sql){
        mysqli_query($this->conexion, $sql);
    }
    public function close(){
        mysqli_close($this->conexion);
    }
}