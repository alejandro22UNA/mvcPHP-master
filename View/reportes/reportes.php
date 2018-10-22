
  <div class="row">
  <div class="container center">
        <h3>
        Reportes
        </h3>
    
    <form class="col s12" id="frm-producto" action="?c=reportes&a=Informacion_personal&cedula_paciente=402140420" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="input-field col s4">
          <input id="cedula_paciente" type="number"   onkeyup="realizaProceso($('#cedula_paciente').val())" placeholder="Buscar por Cedula">
        </div> 
          <div class="col s8">
            <select class="browser-default" id="select_cedula_paciente" name="select_cedula_paciente_cita" value="<?php echo $cit->select_cedula_paciente_cita; ?>" >
              <option value="" >Selecionar Cedula</option>
            </select>
          </div>        
      </div>

      <div class="row">
        
        <div class="col s2">
        <p>
            <label>
                <input type="checkbox" class="filled-in" id="informacion_personal" />
                <span>Información Personal</span>
            </label>
        </p>
        </div>
        <div class="col s2">
        <p>
            <label>
                <input type="checkbox" class="filled-in"/>
                <span>Historial de Citas</span>
            </label>
        </p>
        </div>
        <div class="col s2">
        <div class="text-right center"> 
            <button class="btn btn-success blue">Generar Reporte</button>
        </div>
        </div>
      </div>
   
      
    </form>
    </div>
  </div>
<div id="info_personal" style="width:100%">
</div>
<script src="assets/js/functions.js"></script>

