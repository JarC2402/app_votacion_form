<!-- La función principal de este archivo es encapsular la lógica de conexión a la base de datos en un objeto reutilizable.  -->
<?php
class CConexion {
    public function ConexionBD(){
        $host = "localhost";
        $dbname = "desis_db";
        $username = "postgres";
        $pasword = "root";

        try {
            $conn = new PDO("pgsql:host=$host; dbname=$dbname", $username, $pasword);
        }
        catch (PDOException $exp){
            echo "No se pudo conectar a la base de datos: " . $exp->getMessage();
        }
        return $conn;
    }
}
?>
