
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
$cedula_paciente = $_POST['cedula'];
$sql = "SELECT * FROM tbl_pacientes WHERE cedula_paciente = $cedula_paciente";
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
     echo "<div class='row' id='card_info_personal'>
     <div class='col s12 m12 l12'>
       <div class='card blue darken-1'>
         <div class='card-content white-text'>
           <span class='card-title'>Informacion Personal </span>
           <p name='' name=".$row["cedula_paciente"].">Cedula: ".$row["cedula_paciente"]."</p>
           <p>Nombre Completo: ".$row["nombre_paciente"]. " " .$row["apellido_1"]." ".$row["apellido_2"]."</p>
           <p>Telefono: ".$row["telefono_paciente"]."</p>
           <p>Direccion: ".$row["direccion_paciente"]."</p>
         </div>
         <div class='card-action'>
           <a href='?c=reportes&a=informacion_personal&cedula_paciente=".$row["cedula_paciente"]."'>Generar Reporte...</a>
         </div>
       </div>
     </div>
   </div>";
    }    		
    
    exit;
}
$resultado->free();
$mysqli->close();
?>
