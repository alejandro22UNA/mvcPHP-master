<?php
class Database
{
    //Esta función permite la conexión al SGBD: MariaDB.
    //host = tipo de conexión local - 'localhost'.
    //dbname = nombre de la base de datos.
    //charset = utf8, indica la codificación de caracteres utilizada.
    //root = nombre de usuario (solo para fines académicos=root).
    //'' = contraseña del root (solo para fines académicos).

    public static function Conectar()
    {
       $pdo = new PDO('mysql:host=localhost;dbname=db_data_clinic;charset=utf8', 'root', '');
        //Filtrando posibles errores de conexión.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    

    
// $servername = "localhost";
// $username = "root";
// $password = "";

// try {
//     $conn = new PDO("mysql:host=$servername;dbname=db_data_clinic", $username, $password);
//     // set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Connected successfully"; 
//     }
// catch(PDOException $e)
//     {
//     echo "Connection failed: " . $e->getMessage();
    
// }
    }
}