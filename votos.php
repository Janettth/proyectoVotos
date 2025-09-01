<?php
session_start();

// Si no hay sesión activa regresar al login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.html");
    exit();
}

include 'PHP/conexion.php';
$usuario_id = $_SESSION['usuario_id'];

// Verificar si ya votó
$sql = "SELECT * FROM votos WHERE usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$yaVoto = ($result->num_rows > 0);

// Obtener el conteo de votos por candidato
$sqlConteo = "SELECT candidato, COUNT(*) as total FROM votos GROUP BY candidato";
$resultConteo = $conn->query($sqlConteo);

$candidatos = [];
while ($row = $resultConteo->fetch_assoc()) {
    $candidatos[$row['candidato']] = $row['total'];
}
?>
<?php
if (isset($_POST['mi_boton'])) {
  
    session_start();
    session_destroy();
    header("Location: index.html");
    exit();
}
?>

<?php 
$candidatosInfo = [
    'ITCJ' => 'assets/logos/itcj.jpg',
    'TEC'  => 'assets/logos/tec.png',
    'URN'  => 'assets/logos/urn.png',
    'UACJ' => 'assets/logos/uacj.png',
    'UACH' => 'assets/logos/uach.svg'
];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votaciones</title>
    <link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>
    <div id="contenedorPrincipal">
        <div id="titulo">
            <p>TORNEO</p>
            <img src="assets/img/Academiab-2.png" alt="" width="30%">
        </div>
        
         <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
            <input id="cerrarSesion" type="submit" name="mi_boton" value="Cerrar Sesión">
        </form>


        <?php if($yaVoto): ?>
            <div id="contenedorRegistro" >
                <h2>Ya has votado. Gracias por participar.</h2>
                <div id="resultados">
                    <?php foreach ($candidatosInfo as $nombre => $img): ?>
                        <div class="contenedorVoto resultado">
                            <h3 class="nombre_condidato"><?= $nombre ?></h3>
                            <div id="candidatosInfo" >
                                <div class="img_candidato">
                                    <img src="<?= $img ?>" alt="<?= $nombre ?>">
                                </div>
                               <p class="votos_candidato"><?= isset($candidatos[$nombre]) ? $candidatos[$nombre] : 0 ?> votos</p>
                            </div>
                            
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <!--aqui mostrar los votos que van-->
        <?php else: ?>

            <div id="votos">
                <div class="contenedorVoto">
                    <div class="img">
                        <img src="assets/logos/itcj.jpg" alt=""">
                    </div>
                    
                    <p>ITCJ</p>
               

                    <form action="PHP/guardar_voto.php" method="POST" >
                        <input type="hidden" name="candidato" value="ITCJ" class="estilo_botonVoto">
                        <button type="submit" id="btn1">VOTAR</button>
                        <!--<input id="btn1" type="button" value="VOTAR">-->
                    </form>
                    
                </div>

                <div class="contenedorVoto">
                    <div class="img">
                        <img src="assets/logos/tec.png" alt=""">
                    </div>
                    
                    <p>TEC</p>
                  

                    <form action="PHP/guardar_voto.php" method="POST" >
                        <input type="hidden" name="candidato" value="TEC">
                        <button type="submit" id="btn2">VOTAR</button>
                        <!--<input id="btn2" type="button" value="VOTAR">-->
                    </form>
                    
                </div>

                <div class="contenedorVoto">
                    <div class="img">
                        <img src="assets/logos/urn.png" alt="" ">
                    </div>
                    
                    <p>URN</p>
               

                    <form action="PHP/guardar_voto.php" method="POST" >
                        <input type="hidden" name="candidato" value="URN">
                        <button type="submit" id="btn3">VOTAR</button>
                        <!--<input id="btn3" type="button" value="VOTAR">-->
                    </form>
                    
                </div>

                <div class="contenedorVoto">

                    <div class="img">

                        <img src="assets/logos/uacj.png" alt="" ">
                    </div>
                    
                    <p>UACJ</p>
             

                    <form action="PHP/guardar_voto.php" method="POST" >
                        <input type="hidden" name="candidato" value="UACJ">
                        <button type="submit" id="btn4">VOTAR</button>
                        <!--<input id="btn4" type="button" value="VOTAR">-->
                    </form>
                    
                </div>

                <div class="contenedorVoto">

                    <div class="img">
                        <img src="assets/logos/uach.svg" alt="" ">
                    </div>
                    
                    <p>UACH</p>
            

                    <form action="PHP/guardar_voto.php" method="POST" >
                        <input type="hidden" name="candidato" value="UACH">
                        <button type="submit" id="btn5">VOTAR</button>
                        <!--<input id="btn5" type="button" value="VOTAR">-->
                    </form>
                    
                </div>




            </div>
        <?php endif; ?>

       
    </div>
</body>
<!--<script src="JS/votos.js"></script>-->
</html>

