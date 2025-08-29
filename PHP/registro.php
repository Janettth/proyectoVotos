<?php
$servername = "localhost"; 
$username   = "root";       
$password   = "";             
$dbname     = "torneo";        


$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$correo  = $_POST['correo'];
$contra   = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Encriptar contraseña

// Insertar en la base de datos
$sql = "INSERT INTO `usuarios`(`nombre`, `correo`, `contrasena`) VALUES ('$nombre','$correo','$contra')";


if ($conn->query($sql) == TRUE) {
    echo'<script type="text/javascript">
    alert("Registro exitoso");
    window.location.href="../index.html";
    </script>';
} else {
    echo'<script type="text/javascript">
    alert("Error");
    window.location.href="../registro.html";
    </script>';
}

$conn->close();
?>

