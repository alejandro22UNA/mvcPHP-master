
<?php

$mysqli = new mysqli('localhost', 'root', '', 'db_data_clinic');


if ($mysqli->connect_errno) {
   
    echo "Lo sentimos, este sitio web está experimentando problemas.";

    
    echo "Error: Fallo al conectarse a MySQL debido a: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";

    exit;
}

// Realizar una consulta SQL
$fecha = $_POST['fecha'];
$sql = "SELECT * FROM tbl_citas WHERE fecha_cita = '".$fecha."'";
if (!$resultado = $mysqli->query($sql)) {
    // ¡Oh, no! La consulta falló. 
    echo "Lo sentimos, este sitio web está experimentando problemas.";

    // De nuevo, no hacer esto en un sitio público, aunque nosotros mostraremos
    // cómo obtener información del error
    echo "Error: La ejecución de la consulta falló debido a: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}


if ($resultado->num_rows === 0) {
    echo '<option value="">Sin Registros</option>';
    exit;
}
if ($resultado->num_rows > 0) {
    while($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        echo $row["id_horario"]; 
    }

   
    		
    
    exit;
}
$resultado->free();
$mysqli->close();
?>
