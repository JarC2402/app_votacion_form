<!-- este archivo esta la estructura basica de html, donde se verifica que el usuario llene los datos correctamente de ser asi se envia el formunlario de forma correcta -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<h2>Formulario de votacion</h2>
    <form class="Form_content" action="form.php"  method="post">
    
        <div><label for="name">Nombre y apellido:</label>
        <input type="text" id="name" name="name"placeholder="Nombre completo"></div>
        <div><label for="alias">Alias:</label>
        <input type="text" id="alias" name="alias"></div>
        <div><label for="RUT">RUT:</label>
        <input type="text" id="RUT" name="RUT" placeholder="Ejemplo: 02482587-3"></div>
        <div><label for="Email">Email:</label>
        <input type="text" id="email" name="email"  placeholder="ejemplo@gmail.com"></div>
        
        <div><label  for="Region">Region:</label>
                 <select name="region" id="region" onchange="loadComunas(this.value);">

                    <option value="option1">Seleccionar</option>
                    <?php
                    require_once "conexion.php";
                    $objetoConexion = new CConexion();
                    $conn = $objetoConexion->ConexionBD();
                    
                    $sql = "SELECT id, name FROM region";
                    $result = $conn->query($sql);
                    
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                    }
                    ?>
                  </select>
        </div>
        <div id="comunaContainer">
            <label for="Comuna">Comuna:</label>
            <select name="comuna" id="comuna">
                <option value="option1">Seleccionar</option>
            </select>
        </div>

        <div>
            <label for="Candidato">Candidato:</label>
            <select name="candidato">
            <option value="option1" id="candidato">Seleccionar</option>
            <?php
                require_once "conexion.php";
                $objetoConexion = new CConexion();
                $conn = $objetoConexion->ConexionBD();

                $sql = "SELECT id, name FROM candidato";
                $result = $conn->query($sql);

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                }
            ?>

          </select>
        </div>
    <label for="survey">Como se entero de nosotros: </label>
    <span>Web</span><input type="checkbox" id="Web" name="Web">
    <span>tv</span><input type="checkbox" id="tv" name="tv">
    <span>Red social</span><input type="checkbox" id="Red social" name="socialred">
    <span>Amigos</span><input type="checkbox" id="Friends" name="Friends">
    <hr> <div><input type="submit" value="Send" onclick="return dataCheck()"></div>
    </form>
    <script src="main.js"></script>
    <script>
        function loadComunas(regionId) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var comunas = JSON.parse(this.responseText);
                    var selectComuna = document.getElementById("comuna");
                    selectComuna.innerHTML = ""; // Limpiar opciones anteriores
                    
                    // Agregar las opciones de las comunas
                    for (var i = 0; i < comunas.length; i++) {
                        var option = document.createElement("option");
                        option.value = comunas[i].id;
                        option.text = comunas[i].name;
                        selectComuna.appendChild(option);
                    }
                }
            };
            xhttp.open("GET", "comuna.php?regionId=" + regionId, true);
            xhttp.send();
        }
    </script>
    <?php

require_once "conexion.php";

$objetoConexion = new CConexion();
$conn = $objetoConexion->ConexionBD();
    ?>
</body>
</html>