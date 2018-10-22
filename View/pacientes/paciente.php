<h4 class="page-header">Mis Pacientes </h4>
<script src="assets/js/pagination.js"></script>
<script src="assets/js/functions.js"></script>

<!-- <select class="browser-default" id="select_numero_filas" name="select_numero_filas" value="" onchange="cambiarLongitudFilas($('#select_numero_filas').val())" >
<option value="" >Selecionar </option>
<option value="10" >10 </option>
<option value="20" >20 </option>
</select> -->

    <div class="row">
        <br>
        <i class="material-icons" onclick="buscar()" >search</i> 
    </div>
<div id="divOculto" class="row white z-depth-1">
    <br>
    <div class="input-field col s10">
            <input id="cedula_paciente" type="text" style="width:100% !important;"  onkeyup="filtrar_paciente($('#cedula_paciente').val())" placeholder="Busqueda por Nombre o Cedula" value="">   
    </div>
    <div class="col s2">
        <div class="center">
            <button class="btn" onclick="cerrar()">Cerrar</button>
        </div> 
    </div>
    <div id="myDiv">  
    </div>

</div>


<table class="table table-striped highlight" id="miTabla">
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
    <tbody id="myTable">
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
<div class="col-md-12 center text-center">
	<span class="left" id="total_reg"></span>
    <ul class="pagination pager" id="myPager"></ul>
</div>
  

