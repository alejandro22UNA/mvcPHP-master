<?php

require_once('fpdf181/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
   // $this->Image('logo_pb.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Reportes DATA CLINIC',1,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
   // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

class Reportes
{
	private $pdo;

    public $cedula_paciente;
    public $nit;
    public $nomprod;
    public $precioU;
    public $descrip;
    

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

			$stm = $this->pdo->prepare("SELECT * FROM producto");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idProducto)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM producto WHERE idProducto = ?");
			$stm->execute(array($idProducto));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idProducto)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM producto WHERE idProducto = ?");

			$stm->execute(array($idProducto));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
    }
    function getInfo($cedula_paciente){
        try
		{
			$stm = $this->pdo
			            ->prepare("SELECT * FROM tbl_pacientes WHERE cedula_paciente = ?");

            $stm->execute(array($cedula_paciente));
            return $stm->fetchAll();
            //return $stm->fetchAll(PDO::FETCH_OBJ);

            
		} catch (Exception $e)
		{
			die($e->getMessage());
		}

    }
    public function informacion_personal($cedula_paciente)
	{
        $pdf = new FPDF();
		try
		{
			$data = $this->getInfo($cedula_paciente);

           // $stm->execute(array($cedula_paciente));
			//$array = $stm->fetchAll(PDO::FETCH_OBJ);
			$pdf->AliasNbPages();
			$pdf->AddPage();
			$pdf->Header();
            $pdf->SetFont('Arial','B',12);
            $content ='';
            foreach($data as $row) {
            $pdf->SetFillColor(153,255,153);
			$pdf->SetTextColor(0);
			//$pdf->Cell(28,10,'Información Personal del Paciente');
            $pdf->Cell(1,10,$row['cedula_paciente']);
            $pdf->Cell(1,20,$row['nombre_paciente']);
            $pdf->Cell(1,30,$row['apellido_1']);
            $pdf->Cell(1,40,$row['apellido_2']);
            $pdf->Cell(1,53,$row['fecha_nacimiento']);
            $pdf->Cell(1,60,$row['telefono_paciente']);
			$pdf->Cell(1,65,$row['direccion_paciente']);
			$pdf->Footer();
           // $pdf->Cell(40, 40,array($row['cedula_paciente'], $fila['nombre_paciente'], $fila['apellido_1'], $fila['apellido_2']));
        }
            $pdf->Output();
            

        

            
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE producto SET
						nomprod          = ?,
						precioU        = ?,
            descrip        = ?
				    WHERE idProducto = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nomprod,
                        $data->precioU,
                        $data->descrip,
                        $data->idProducto
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(producto $data)
	{
		try
		{
		$sql = "INSERT INTO producto (idProducto,nit,nomprod,precioU,descrip)
		        VALUES (?, ?, ?, ?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->idProducto,
                    $data->nit,
                    $data->nomprod,
                    $data->precioU,
                    $data->descrip
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
