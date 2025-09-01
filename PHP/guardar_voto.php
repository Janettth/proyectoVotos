<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../index.html");
    exit();
}

include 'conexion.php';

$usuario_id = $_SESSION['usuario_id'];
$candidato  = $_POST['candidato'] ?? ''; 

if ($candidato != '') {
    //agrega los datos a la base de datos
    $sql = "INSERT INTO votos (usuario_id, candidato) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $usuario_id, $candidato);

    if ($stmt->execute()) {
        echo "<script>alert('Voto registrado con éxito'); window.location.href='../votos.php';</script>";
    } else {
        echo "<script>alert('Ya has votado antes'); window.location.href='../votos.php';</script>";
    }
} else {
    echo "<script>alert('Error: candidato no seleccionado'); window.location.href='../votos.php';</script>";
}
?>