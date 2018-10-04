<h4 class="page-header">Mis Pacientes </h4>

<table class="table table-striped highlight">
    <thead>
        <tr>
            <th>Cedula</th>
            <th >Nombre</th>
            <th >Apellido</th>
            <th >Apellido</th>
            <th >Fecha Nacimiento</th>
            <th >Telefono</th>
            <th >Direccion</th>
            <th >Codigo Expediente</th>
            <th >Observacion</th>
            <th >Editar</th>
            <th >Eliminar</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->cedula_paciente; ?></td>
            <td><?php echo $r->nombre_paciente; ?></td>
            <td><?php echo $r->apellido_1; ?></td>
            <td><?php echo $r->apellido_2; ?></td>
            <td><?php echo $r->fecha_nacimiento; ?></td>
            <td><?php echo $r->telefono_paciente; ?></td>
            <td><?php echo $r->direccion_paciente; ?></td>
            <td><?php echo $r->codigo_expediente; ?></td>
            <td><?php echo $r->observaciones_paciente; ?></td>
            <td>
                <a href="?c=pacientes&a=Crud&cedula=<?php echo $r->cedula_paciente; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=pacientes&a=Eliminar&cedula=<?php echo $r->cedula_paciente; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
