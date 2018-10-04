<h1 class="page-header">
    <?php echo $pac->cedula_paciente != null ? $pac->nombre_paciente : 'Nuevo Registro'; ?>
</h1>

<form id="frm-producto" action="?c=pacientes&a=Editar" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="form-group col s6">
            <label>Cedula</label>
            <input type="text" name="cedula_paciente" value="<?php echo $pac->cedula_paciente; ?>" class="form-control" placeholder="Cedula"  />
        </div>

        <div class="form-group col s6">
            <label>Nombre</label>
            <input type="text" name="nombre_paciente" value="<?php echo $pac->nombre_paciente; ?>" class="form-control" placeholder="Nombre" />
        </div>
    </div>

    <div class="row">
    
            <div class="form-group col s6">
                <label>Apellido 1</label>
                <input type="text" name="apellido_1" value="<?php echo $pac->apellido_1; ?>" class="form-control" placeholder="Apellido"  />
            </div>
            <div class="form-group col s6">
                <label>Apellido 2</label>
                <input type="text" name="apellido_2" value="<?php echo $pac->apellido_2; ?>" class="form-control" placeholder="Apellido"  />
            </div>
    </div>
    <div class="row">
    
        <div class="form-group col s6">
            <label for="fecha_nacimiento">Fecha Nacimiento</label>
            <input id="fecha_nacimiento" type="text" name="fecha_nacimiento" value="<?php echo $pac->fecha_nacimiento; ?>" class="datepicker">
            
        </div>
        <div class="form-group col s6">
            <label for="telefono_paciente">Telefono</label>
            <input type="text" name="telefono_paciente" value="<?php echo $pac->telefono_paciente; ?>" class="form-control" placeholder="Apellido"  />
        </div>
    </div>

    <div class="form-group">
        <label for="direccion Paciente">Direccion Paciente</label>
        <input type="text" name="direccion_paciente" value="<?php echo $pac->direccion_paciente; ?>" class="form-control" placeholder="Direccion Paciente"  />
    </div>
    <div class="form-group">
        <label>Observaciones:</label>
        <input type="text" name="observacion_paciente" value="<?php echo $pac->observaciones_paciente; ?>" class="form-control" placeholder="Observaciones" />
    </div>
    <div class="text-right"> 
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-producto").submit(function(){
            return $(this).validate();
        });
    })
</script>
