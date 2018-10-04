<?php
class paciente
{
	private $pdo;

    public $cedula_paciente;
    public $nombre_paciente;
	public $apellido_1;
	public $apellido_2;
	public $fecha_nacimiento;
	public $telefono_paciente;
	public $direccion_paciente;
	public $observacion_paciente;
	public $codigo_expediente;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::Conectar();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM db_data_clinic.tbl_pacientes;");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($cedula_paciente)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM tbl_pacientes WHERE cedula_paciente = ?");
			$stm->execute(array($cedula_paciente));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($cedula_paciente)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM tbl_pacientes WHERE cedula_paciente = ?");

			$stm->execute(array($cedula_paciente));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE tbl_pacientes SET
						nombre_paciente=?,
						apellido_1=?,
						apellido_2=?,
                        fecha_nacimiento=?,
						telefono_paciente=?,
						direccion_paciente=?,
						observaciones_paciente=?,
						codigo_expediente = ?,
				        WHERE cedula_paciente = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre_paciente,
						$data->apellido_1,
						$data->apellido_2,
                        $data->fecha_nacimiento,
						$data->telefono_paciente,
						$data->direccion_paciente,
						$data->observacion_paciente,
						$data->codigo_expediente,
                        $data->cedula_paciente
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(paciente $data)
	{
		try
		{
		$sql = "INSERT INTO tbl_pacientes (cedula_paciente,nombre_paciente,apellido_1,apellido_2,fecha_nacimiento,telefono_paciente,direccion_paciente,codigo_expediente,observaciones_paciente)VALUES (?,?,?,?,?,?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->cedula_paciente,
                    $data->nombre_paciente,
					$data->apellido_1,
					$data->apellido_2,
					$data->fecha_nacimiento,
					$data->telefono_paciente,
					$data->direccion_paciente,
					$data->codigo_expediente,
                    $data->observacion_paciente
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
