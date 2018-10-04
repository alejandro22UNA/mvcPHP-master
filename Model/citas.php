<?php
class citas
{
	private $pdo;

    public $cedula_paciente;
    public $fecha_cita;
    public $estado_cita;
    public $observaciones_cita;

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

			$stm = $this->pdo->prepare("SELECT cedula_paciente,nombre_paciente,estado_cita,apellido_1,fecha_cita,horario FROM tbl_pacientes INNER JOIN tbl_citas
			ON cedula_paciente = tbl_citas.cedula_paciente_cita INNER JOIN tbl_horario ON tbl_citas.id_horario = tbl_horario.id_horario AND estado_cita='ACTIVA' AND tbl_citas.fecha_cita=CURDATE() order by tbl_citas.fecha_cita DESC;");
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
			$stm = $this->pdo->prepare("SELECT * FROM tbl_citas WHERE cedula_paciente_cita = ?");
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
			            ->prepare("DELETE FROM tbl_citas WHERE cedula_paciente_cita = ?");

			$stm->execute(array($cedula_paciente));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Terminar($cedula_paciente,$fecha_cita)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("UPDATE tbl_citas SET estado_cita='TERMINADA' WHERE cedula_paciente_cita = ? AND fecha_cita = ?");

			$stm->execute(array($cedula_paciente,$fecha_cita));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE tbl_citas SET
						cedula_paciente          = ?,
						fecha_cita        = ?,
						estado_cita =?,
            observaciones_cita = ?
				    WHERE cedula_paciente = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->cedula_paciente,
						$data->fecha_paciente,
						$data->estado_cita,
                        $data->observaciones_cita
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(citas $data)
	{
		try
		{
		$sql = "INSERT INTO `tbl_citas`(`fecha_cita`, `estado_cita`, `cedula_paciente_cita`, `id_horario`, `observaciones_cita`) VALUES (?,'ACTIVA',?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->fecha_cita,
					$data->select_cedula_paciente_cita,
					$data->id_horario,
                    $data->observaciones_cita
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
