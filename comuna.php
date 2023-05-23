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
