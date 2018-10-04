<?php
require_once 'model/citas.php';

class CitasController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new citas();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/citas/citas.php';
        require_once 'view/footer.php';
    }

    public function Crud(){
        $cit = new citas();

        if(isset($_REQUEST['cedula_paciente'])){
            $cit = $this->model->Obtener($_REQUEST['cedula_paciente']);
        }

        require_once 'view/header.php';
        require_once 'view/citas/citas-editar.php';
        require_once 'view/footer.php';
    }

    public function Nuevo(){
        $cit = new citas();

        require_once 'view/header.php';
        require_once 'view/citas/citas-nuevo.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $cit = new citas();

        
        $cit->fecha_cita = $_REQUEST['fecha_cita'];
        $cit->select_cedula_paciente_cita = $_REQUEST['select_cedula_paciente_cita'];
        $cit->id_horario = $_REQUEST['id_horario'];
        $cit->observaciones_cita = $_REQUEST['observaciones_cita'];

        $this->model->Registrar($cit);

        header('Location: index.php?c=citas');
    }

    public function Editar(){
        $cit = new producto();

        $cit->cedula_paciente = $_REQUEST['cedula_paciente'];
        $cit->fecha_cita = $_REQUEST['fecha_cita'];
        $cit->observaciones = $_REQUEST['observaciones'];

        $this->model->Actualizar($cit);

        header('Location: index.php?c=citas');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['cedula_paciente']);
        header('Location: index.php?c=citas');
    }
    public function Terminar(){
        $this->model->Terminar($_REQUEST['cedula_paciente'],$_REQUEST['fecha_cita']);
        header('Location: index.php?c=citas');
    }
}
