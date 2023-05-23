<!-- en resumen este archivo verifica si se ha enviado el formulario, verifica que el voto no este duplicado verificando el rut
en caso de que sea voto unico procede a guardar la informacion en la base de datos y redirigir a la pag inicial.
-->
<?php
require_once "conexion.php";

$objetoConexion = new CConexion();
$conn = $objetoConexion->ConexionBD();

// Obtener el RUT del formulario
$rut = $_POST['RUT'];

// Consultar si el RUT ya existe en la tabla de usuarios
$sql = "SELECT * FROM users WHERE rut = :rut";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':rut', $rut);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    // Si el RUT ya existe, mostrar mensaje de error
  ($mensaje = "Ya se ha registrado un voto con ese RUT. No se permiten votos duplicados.");
  } else {
    // Obtener los valores del formulario
    $name = $_POST['name'];
    $alias = $_POST['alias'];
    $rut = $_POST['RUT'];
    $region = $_POST['region'];
    $comuna = $_POST['comuna'];
    $candidato = $_POST['candidato'];
    $web = isset($_POST['Web']) ? 1 : 0;
    $tv = isset($_POST['tv']) ? 1 : 0;
    $socialred = isset($_POST['socialred']) ? 1 : 0;
    $friend = isset($_POST['Friends']) ? 1 : 0;

    // Insertar el voto en la tabla de usuarios
    $sql = "INSERT INTO users (name, alias, rut, region_id, comuna_id, candidato_id, tv, web, socialred, friend) VALUES (:name, :alias, :rut, :region, :comuna, :candidato, :tv, :web, :socialred, :friend)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':alias', $alias);
    $stmt->bindParam(':rut', $rut);
    $stmt->bindParam(':region', $region);
    $stmt->bindParam(':comuna', $comuna);
    $stmt->bindParam(':candidato', $candidato);
    $stmt->bindParam(':tv', $tv);
    $stmt->bindParam(':web', $web);
    $stmt->bindParam(':socialred', $socialred);
    $stmt->bindParam(':friend', $friend);

    if ($stmt->execute()) {
        $mensaje = "El voto ha sido registrado correctamente.";
    }
}
?>
<!-- este codigo es solo para mostrar el mensaje de exito o error de la votacion -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulario de votacion</title>
</head>
<body>
    <script src="form.php"></script>
    <h2>Formulario de votacion</h2>
    <div class="message"><?php echo $mensaje; ?></div>
    <script>
        setTimeout(function(){
            window.location.href = "index.php";
        }, 3000);
    </script>
</body>
</html>