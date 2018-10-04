

<div class="container">
<h3 class="page-header">
    Registrar Paciente
</h3>
<form id="frm-producto" action="?c=pacientes&a=Guardar" method="post" enctype="multipart/form-data" class="">
    <div class="row">
        <div class="form-group col s3">
            <input type="number" name="cedula_paciente" value="<?php echo $pac->cedula_paciente; ?>" class="form-control" placeholder="Cedula"  required/>
        </div>

        <div class="form-group col s3">
            
            <input type="text" name="nombre_paciente" value="<?php echo $pac->nombre_paciente; ?>" class="form-control" placeholder="Nombre" required />
        </div>
        <div class="form-group col s3">
                
                <input type="text" name="apellido_1" value="<?php echo $pac->apellido_1; ?>" class="form-control" placeholder="Apellido 1"  required/>
            </div>
            <div class="form-group col s3">
                <input type="text" name="apellido_2" value="<?php echo $pac->apellido_2; ?>" class="form-control" placeholder="Apellido 2"  required/>
            </div>
    </div>
    <div class="row">
    
        <div class="form-group col s3">
            <label for="fecha_nacimiento">Fecha Nacimiento</label>
            <input id="fecha_nacimiento" type="text" name="fecha_nacimiento" value="<?php echo $pac->fecha_nacimiento; ?>" class="datepicker" placeholder="dd/mm/aaa" required>
            
        </div>
        <div class="form-group col s3">
            <label for="telefono_paciente">Telefono</label>
            <input type="text" name="telefono_paciente" value="<?php echo $pac->telefono_paciente; ?>" class="form-control" placeholder="Telefono" required />
        </div>
        <div class="col s3">
                <label for="direccion Paciente">Direccion Paciente</label>
                <input type="text" name="direccion_paciente" value="<?php echo $pac->direccion_paciente; ?>" class="form-control" placeholder="Direccion Paciente"  required/>
            </div>
            <div class="col s3">
            <label for="direccion Paciente">Codigo Expediente</label>
                <input type="text" name="codigo_expediente" value="<?php echo $pac->codigo_expediente; ?>" class="form-control" placeholder="Codigo Expediente"  required/>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
           
        </div>

    </div>
    <div class="form-group">
            <div class="col s8">
            <label>Observaciones:</label>
                <input type="text" name="observacion_paciente" value="<?php echo $pac->observacion_paciente; ?>" class="form-control" placeholder="Observaciones" required/>
            </div>
        </div>
        
    </div>
    <br>
    <div class="text-right center"> 
        <button class="btn btn-success blue">Guardar</button>
    </div>
</form>
</div>