


<script src="assets/js/functions.js"></script>
  <div class="row">
    <div class="container">
    <h4 class="center">
        Registrar Cita
    </h4>
    <br>
    <h5>Buscar por Cedula o Nombre:</h5><br>
    <form class="col s12" id="frm-producto" action="?c=citas&a=Guardar" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="input-field col s4">
          <input id="cedula_paciente" type="text"   onkeyup="realizaProceso($('#cedula_paciente').val())" placeholder="Busqueda por Nombre o Cedula" value="">
          
        </div> 
          <div class="col s8">
            
            <select class="browser-default" id="select_cedula_paciente" name="select_cedula_paciente_cita" value="<?php echo $cit->select_cedula_paciente_cita; ?>" onchange="copyValue()" onclick="copyValue()">
              <option value="" >Selecionar Cedula</option>
            </select>
          </div>        
      </div>

      <div class="row">
        <div class="input-field col s4">
            <input id="fecha_cita" type="text" onchange="updateButtons($('#fecha_cita').val())" name="fecha_cita" value="<?php echo $cit->fecha_cita; ?>" class="datepicker" placeholder="Fecha Cita">
        </div>
        
        <div class="input-field col s8">
          <select id="select_horarios" name="id_horario" value="<?php echo $cit->id_horario; ?>" class="browser-default">
          <option value="" disabled selected>Seleccione Horario</option>
            <option value="1">8:00 am</option>
            <option value="2">8:30 am</option>
            <option value="4">9:00 am</option>
            <option value="5">9:30 am</option>
            <option value="6">10:00 am</option>
            <option value="7">10:30 am</option>
            <option value="8">11:00 am</option>
            
          </select>
        </div>
      </div>

      <br>
      <div class="row">
        <div class="input-field col s12">
          <input id="observaciones" type="text" name="observaciones_cita" value="<?php echo $cit->observaciones_cita; ?>" required placeholder="Observaciones">
        </div>
      </div>
  
      <div class="text-right center"> 
        <button class="btn btn-success blue">Guardar</button>
    </div>
    </form>
    </div>
  </div>
  

