<!-- este archivo se realiza una consulta a una base de datos 
para obtener las comunas de una región específica y devuelve los resultados en formato JSON. 
con la finalidad de filtrar solo las comunas pertenecientes a la region seleccionada anteriormente
-->
<?php
if (isset($_GET['regionId'])) {
    $regionId = $_GET['regionId'];

    require_once "conexion.php";
    $objetoConexion = new CConexion();
    $conn = $objetoConexion->ConexionBD();

    $sql = "SELECT id, name FROM comuna WHERE region_id = :regionId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':regionId', $regionId);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
}
?>
