
<?php

    $mysqli = new mysqli('localhost', 'root', '', 'db_data_clinic');

    if ($mysqli->connect_errno) {
    
        echo "Lo sentimos, este sitio web está experimentando problemas.";

        echo "Error: Fallo al conectarse a MySQL debido a: \n";
        echo "Errno: " . $mysqli->connect_errno . "\n";
        echo "Error: " . $mysqli->connect_error . "\n";
        
        exit;
    }

$value = $_POST['value'];


if($value == 1){
    $cedula = $_POST['cedula'];
   //$sql = "SELECT cedula_paciente FROM tbl_pacientes WHERE cedula_paciente LIKE '".$cedula."%' ";
    $sql = "SELECT cedula_paciente,nombre_paciente,apellido_1 
    FROM tbl_pacientes AS pacientes 
    WHERE pacientes.cedula_paciente LIKE '%".$cedula."%' 
    OR pacientes.nombre_paciente LIKE '%".$cedula."%' 
    OR pacientes.apellido_1 LIKE '%".$cedula."%'  GROUP by cedula_paciente ";
        if (!$resultado = $mysqli->query($sql)) {
        
            echo "Lo sentimos, este sitio web está experimentando problemas.";
            echo "Error: La ejecución de la consulta falló debido a: \n";
            echo "Query: " . $sql . "\n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit;
        }

        if ($resultado->num_rows === 0) {
            echo '<option value="">Sin Registros</option>';;
            exit;
        }
        if ($resultado->num_rows >= 0) {
            while($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                $Array[] = $row;
                echo '<option value='.$row["cedula_paciente"].'>'.$row["cedula_paciente"]. ' '.$row["nombre_paciente"].' '.$row["apellido_1"].' </option>';
            }
            exit;
        }

        $result = $resultado->fetch_assoc();
        echo $result['cedula_paciente'];

        // El script automáticamente liberará el resultado y cerrará la conexión
        // a MySQL cuando finalice, aunque aquí lo vamos a hacer nostros mismos
        $resultado->free();
        $mysqli->close();
}if($value == 2){

    $filtrar = $_POST['filtro'];

    if($filtrar == 1){
    $sql = "SELECT cedula_paciente,nombre_paciente,estado_cita,apellido_1,fecha_cita,horario FROM tbl_pacientes INNER JOIN tbl_citas
    ON cedula_paciente = tbl_citas.cedula_paciente_cita INNER JOIN tbl_horario ON tbl_citas.id_horario = tbl_horario.id_horario AND estado_cita='ACTIVA' AND tbl_citas.fecha_cita=CURDATE() order by tbl_citas.fecha_cita DESC;";

    if (!$resultado = $mysqli->query($sql)) {
            
        echo "Lo sentimos, este sitio web está experimentando problemas.";
        echo "Error: La ejecución de la consulta falló debido a: \n";
        echo "Query: " . $sql . "\n";
        echo "Errno: " . $mysqli->errno . "\n";
        echo "Error: " . $mysqli->error . "\n";
        exit;
    }

    if ($resultado->num_rows === 0) {
        echo '<option value="">Sin Registros</option>';;
        exit;
    }
    if ($resultado->num_rows >= 0) {
        while($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $Array[] = $row;
            //echo '<option value='.$row["cedula_paciente"].'>'.$row["cedula_paciente"]. ' '.$row["nombre_paciente"].' '.$row["apellido_1"].' </option>';
            echo '<tr>
                    <td>'.$row["cedula_paciente"].'</td>
                    <td>'.$row["nombre_paciente"].'</td>
                    <td>'.$row["apellido_1"].'</td>
                    <td>'.$row["fecha_cita"].'</td>
                    <td>'.$row["horario"].'</td>
                    <td>'.$row["estado_cita"].'</td>
                    <td>
                        <a href="?c=citas&a=Crud&cedula=<?php echo $r->cedula_paciente; ?>">Editar</a>
                    </td>
                    <td>
                        <a onclick="javascript:return confirm("¿Seguro(a) de Terminar esta cita?");" href="?c=citas&a=Terminar&cedula_paciente=<?php echo $r->cedula_paciente; ?>&fecha_cita=<?php echo $r->fecha_cita; ?>">Terminar</a>
                    </td>
                    
                </tr>';
        }
        //$Json = json_encode($Array);
        //echo $Json;
        
        exit;
    }

    $result = $resultado->fetch_assoc();

    $resultado->free();
    $mysqli->close();
}if($filtrar ==2){
    $sql = "SELECT cedula_paciente,estado_cita,nombre_paciente,apellido_1,fecha_cita,horario FROM tbl_pacientes INNER JOIN tbl_citas
    ON cedula_paciente = tbl_citas.cedula_paciente_cita INNER JOIN tbl_horario ON tbl_citas.id_horario = tbl_horario.id_horario  order by tbl_citas.fecha_cita DESC;";

    if (!$resultado = $mysqli->query($sql)) {
            
        echo "Lo sentimos, este sitio web está experimentando problemas.";
        echo "Error: La ejecución de la consulta falló debido a: \n";
        echo "Query: " . $sql . "\n";
        echo "Errno: " . $mysqli->errno . "\n";
        echo "Error: " . $mysqli->error . "\n";
        exit;
    }

    if ($resultado->num_rows === 0) {
        echo '<option value="">Sin Registros</option>';;
        exit;
    }
    if ($resultado->num_rows >= 0) {
        while($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $Array[] = $row;
            //echo '<option value='.$row["cedula_paciente"].'>'.$row["cedula_paciente"]. ' '.$row["nombre_paciente"].' '.$row["apellido_1"].' </option>';
            echo '
                <tr>
                    <td>'.$row["cedula_paciente"].'</td>
                    <td>'.$row["nombre_paciente"].'</td>
                    <td>'.$row["apellido_1"].'</td>
                    <td>'.$row["fecha_cita"].'</td>
                    <td>'.$row["horario"].'</td>
                    <td>'.$row["estado_cita"].'</td>
                    <td>
                        <a href="?c=citas&a=Crud&cedula=<?php echo $r->cedula_paciente; ?>">Editar</a>
                    </td>
                    <td>
                        <a onclick="javascript:return confirm("¿Seguro(a) de Terminar esta cita?");" href="?c=citas&a=Terminar&cedula_paciente=<?php echo $r->cedula_paciente; ?>&fecha_cita=<?php echo $r->fecha_cita; ?>">Terminar</a>
                    </td>
                    
                </tr>';
        }
        //$Json = json_encode($Array);
        //echo $Json;
        
        exit;
    }

    $result = $resultado->fetch_assoc();

    $resultado->free();
    $mysqli->close();
}


}

if($value == 3){
    $cedula = $_POST['filtro'];
   //$sql = "SELECT cedula_paciente FROM tbl_pacientes WHERE cedula_paciente LIKE '".$cedula."%' ";
    $sql = "SELECT cedula_paciente,nombre_paciente,apellido_1 
    FROM tbl_pacientes AS pacientes 
    WHERE pacientes.cedula_paciente LIKE '%".$cedula."%' 
    OR pacientes.nombre_paciente LIKE '%".$cedula."%' 
    OR pacientes.apellido_1 LIKE '%".$cedula."%'  GROUP by cedula_paciente ";
        if (!$resultado = $mysqli->query($sql)) {
        
            echo "Lo sentimos, este sitio web está experimentando problemas.";
            echo "Error: La ejecución de la consulta falló debido a: \n";
            echo "Query: " . $sql . "\n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit;
        }

        if ($resultado->num_rows === 0) {
            echo '<option value="">Sin Registros</option>';;
            exit;
        }
        if ($resultado->num_rows >= 0) {
            while($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                $Array[] = $row;
                echo '<ul class="collection" style="width:100% !important;"><li class="collection-item"><p style="margin:5px;"><strong>Ced: '.$row["cedula_paciente"].'</strong><br> Nombre:  '.$row["nombre_paciente"].' '.$row["apellido_1"].'  <a href="?c=pacientes&a=Crud&cedula='.$row["cedula_paciente"].'"><br>Ver Mas...</a></p></li> </ul>';
            }
            exit;
        }

        $result = $resultado->fetch_assoc();
        //echo $result['cedula_paciente'];

        // El script automáticamente liberará el resultado y cerrará la conexión
        // a MySQL cuando finalice, aunque aquí lo vamos a hacer nostros mismos
        $resultado->free();
        $mysqli->close();
}

?>
