<?php
require_once "../php_UTrack/base.php";

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: inicio.php');
    exit;
}

$nombre_usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROYECTO UTrack</title>
    <link rel="stylesheet" href="../Creacion_UTrack/menu.css">

    <!-- ICONOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

    <header class="navbar">
        <div class="navbar-content">
            <img src="../Imagener_UTrack/image.png" alt="Logo de UTrack" class="logo">

            <nav class="navbar-links">
                <a href="menu.php" class="active">UTrack</a>
                <a href="mapa.php">Mapa</a>
                <a href="comunidad.php">Comunidad</a>
                <a href="estrategias.php">Estrategias de Estudio</a>
            </nav>

            <div class="navbar-user">
                <a href="perfil.php" title="Perfil">
                    <img src="../Imagener_UTrack/Toros.png" alt="Los Toros" class="Toros">
                </a>
            </div>
        </div>
    </header>

    <section class="hero">
        <h1>¡Bienvenido a UTrack <?php echo htmlspecialchars($nombre_usuario); ?>!</h1>
        <p>Sigue tu camino sin perderte.</p>

        <button onclick="window.location.href='mapa.php'">
            Explorar mapa
        </button>
    </section>

    <section class="info-cards">
        <div class="card">
            <i class="fas fa-map fa-2x"></i>
            <h3>Mapa del campus</h3>
            <p>Encuentra tu camino con nuestro plano interactivo.</p>
        </div>

        <div class="card">
            <i class="fas fa-users fa-2x"></i>
            <h3>Comunidad</h3>
            <p>Conéctate con otros estudiantes y recibe apoyo.</p>
        </div>

        <div class="card">
            <i class="fas fa-lightbulb fa-2x"></i>
            <h3>Estrategias de estudio</h3>
            <p>Mejora tus habilidades con recursos útiles.</p>
        </div>
    </section>

    <!-- ==================== TU CONTENIDO ORIGINAL ==================== -->
    <main class="content">
       <h3>Enfoque del proyecto:</h3>
       <br>
        <p class="content-text">
            Facilitar la transición de los estudiantes de preparatoria a la vida universitaria en la UTCJ mediante una plataforma interactiva que ofrezca orientación, ubicación, mentoría y comunidad desde el primer día.
        </p>
        <br>
        <p>
            Empezar la universidad puede ser un reto, ¡pero no tienes que hacerlo solo!
            Aquí encontrarás apoyo, consejos y orientación para adaptarte más rápido a tu nueva etapa, conocer a otros estudiantes y aprovechar al máximo tu experiencia en la UTCJ.
        </p>
        <p>
            Desde cómo moverte por el campus hasta estrategias para rendir mejor en tus clases, UTrack te conecta con la información y las personas que te impulsarán a crecer.
        </p>
        <br>
        <p><strong>Tu historia universitaria comienza aquí. 💚</strong></p>
        <br>

        <br>
        <div class="carrusel"></div>
    </main>

    <footer class="footer">
        <div class="footer-links">
            <a href="https://sise.utcj.edu.mx/" target="_blank">🌐 SISE UTCJ</a>
            <a href="https://www.facebook.com/SOYUTCJ" target="_blank">📘 Facebook</a>
            <a href="mailto:contacto@utrack.com">📧 Correo</a>
        </div>
    </footer>

</body>
</html>
