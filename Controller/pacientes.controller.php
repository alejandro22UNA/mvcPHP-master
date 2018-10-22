<?php
require_once 'model/pacientes.php';

class PacientesController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new paciente();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/pacientes/paciente.php';
        require_once 'view/footer.php';
    }

    public function Crud(){
        $pac = new paciente();

        if(isset($_REQUEST['cedula'])){
            $pac = $this->model->Obtener($_REQUEST['cedula']);
        }

        require_once 'view/header.php';
        require_once 'view/pacientes/paciente-editar.php';
        require_once 'view/footer.php';
    }

    public function Nuevo(){
        $pac = new paciente();

        require_once 'view/header.php';
        require_once 'view/pacientes/registrar_pacientes.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $pac = new paciente();

        $pac->cedula_paciente = $_REQUEST['cedula_paciente'];
        $pac->nombre_paciente = $_REQUEST['nombre_paciente'];
        $pac->apellido_1 = $_REQUEST['apellido_1'];
        $pac->apellido_2 = $_REQUEST['apellido_2'];
        $pac->fecha_nacimiento = $_REQUEST['fecha_nacimiento'];
        $pac->telefono_paciente = $_REQUEST['telefono_paciente'];
        $pac->direccion_paciente = $_REQUEST['direccion_paciente'];
        $pac->codigo_expediente = $_REQUEST['codigo_expediente'];
        $pac->observacion_paciente = $_REQUEST['observacion_paciente'];
        

        $this->model->Registrar($pac);

        header('Location: index.php?c=pacientes');
    }

    public function Editar(){
        $pac = new paciente();

        $pac->cedula_paciente = $_REQUEST['cedula_paciente'];
        $pac->nombre_paciente = $_REQUEST['nombre_paciente'];
        $pac->apellido_1 = $_REQUEST['apellido_1'];
        $pac->apellido_2 = $_REQUEST['apellido_2'];
        $pac->fecha_nacimiento = $_REQUEST['fecha_nacimiento'];
        $pac->telefono_paciente = $_REQUEST['telefono_paciente'];
        $pac->direccion_paciente = $_REQUEST['direccion_paciente'];
       // $pac->codigo_expediente = $_REQUEST['codigo_expediente'];
        $pac->observacion_paciente = $_REQUEST['observacion_paciente'];

        $this->model->Actualizar($pac);
        
        header('Location: index.php?c=pacientes');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['cedula']);
        header('Location: index.php');
    }
}
