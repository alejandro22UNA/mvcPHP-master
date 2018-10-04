
<div class="container">
<h3 class="page-header">Agenda</h3>
<div class="row">
        <div class="col  offset-s8 s2">
                <select id="filtrar" class="browser-default" value="<?php echo $cit->select_filtro_cita; ?>">
                    <option value="" disabled selected>Filtrar Agenda</option>
                    <option value="1">Hoy</option>
                    <option value="2">Todas las Citas</option>
                </select>
        </div>
        <div class="col s2">
            <div class="text-right center"> 
                <button class="btn btn-small btn-success blue" onclick="filtrar($('#filtrar').val())">Filtrar</button>
            </div>
        </div> 
    
</div>


<table class="table table-striped">
    <thead>
        <tr>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Estado Cita</th>
            <th>Editar</th>
            <th>Terminar</th>
            
        </tr>
    </thead>
    <tbody id="table_citas">
    <?php foreach($this->model->Listar() as $r ):?>
        <tr>
            <td><?php echo $r->cedula_paciente; ?></td>
            <td><?php echo $r->nombre_paciente; ?></td>
            <td><?php echo $r->apellido_1; ?></td>
            <td><?php echo $r->fecha_cita; ?></td>
            <td><?php echo $r->horario; ?></td>
            <td><?php echo $r->estado_cita; ?></td>
            <td>
                <a href="?c=citas&a=Crud&cedula=<?php echo $r->cedula_paciente; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro(a) de Terminar esta cita?');" href="?c=citas&a=Terminar&cedula_paciente=<?php echo $r->cedula_paciente; ?>&fecha_cita=<?php echo $r->fecha_cita; ?>">Terminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>
<script src="assets/js/functions.js"></script>
