<?php
 
    session_start();

    $servername = "localhost"; 
    $username   = "root";
    $password   = "";
    $dbname     = "torneo";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $correo     = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    
    echo("<script>console.log('conectado');</script>");
    //revisa se hay cuenta registrada con el correo
    $sql = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        
        $usuario = $result->fetch_assoc();

       
        if (password_verify($contrasena, $usuario['contrasena'])) {
            $_SESSION['usuario_id'] = $usuario['numero'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'];

            // Ir a la pagina de votos
            header("Location: ../votos.php");
            exit();
        } else {
            echo "<script>alert('Contraseña incorrecta'); window.location.href='../index.html';</script>";
        }
    } else {
        echo "<script>alert('Usuario no encontrado'); window.location.href='../index.html';</script>";
    }

    $stmt->close();
    $conn->close();
?>