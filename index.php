<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Institución Educativa - PHP GET y POST</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <h1>Desarrollo de Aplicaciones Web</h1>

    <h2>Navegación</h2>
    <nav>
        <a href="/proyectoGetPost/index.php?seccion=Inicio">Inicio</a>
        <a href="/proyectoGetPost/index.php?seccion=Unidades">Unidades</a>
        <a href="/proyectoGetPost/index.php?seccion=Contacto">Contacto</a>
    </nav>

    <?php
    $seccion_seleccionada = isset($_GET['seccion']) ? htmlspecialchars($_GET['seccion']) : 'Inicio';

    if (isset($_GET['seccion'])) {
        echo "<div class='box get-box'>";
        echo "Se ha seleccionado la sección: <strong>" . $seccion_seleccionada . "</strong>";
        echo "</div>";
    }
    ?>

    <?php
    $clase_color = 'content-inicio';
    if ($seccion_seleccionada == 'Unidades') { $clase_color = 'content-unidades'; }
    if ($seccion_seleccionada == 'Contacto') { $clase_color = 'content-contacto'; }
    ?>
    
    <div class="content-box <?php echo $clase_color; ?>">
        <?php
        switch ($seccion_seleccionada) {
            case 'Unidades':
                echo "<h3>Unidades de Estudio</h3>";
                echo "<p>Explora el contenido programático diseñado para este ciclo académico:</p>";
                echo "<ul>";
                echo "<li><strong>Unidad 1:</strong> Introducción al desarrollo del lado del servidor.</li>";
                echo "<li><strong>Unidad 2:</strong> Gestión de peticiones HTTP .</li>";
                echo "<li><strong>Unidad 3:</strong> Integración de vistas dinámicas en PHP.</li>";
                echo "</ul>";
                break;

            case 'Contacto':
                echo "<h3>Canales de Atención</h3>";
                echo "<p>Si tienes dudas, puedes comunicarte con las oficinas centrales de la institución:</p>";
                echo "<p><strong> Correo de soporte:</strong> soporte@institucion.edu.ec</p>";
                echo "<p><strong> Horario de atención:</strong> Lunes a Viernes de 08:00 a 17:00</p>";
                echo "<p><em>También puedes utilizar el formulario que se encuentra en la parte inferior.</em></p>";
                break;

            case 'Inicio':
            default:
                echo "<h3>Bienvenidos al Campus Virtual</h3>";
                echo "<p>Nuestra plataforma educativa te permite interactuar con los recursos académicos del servidor en tiempo real.</p>";
                
                break;
        }
        ?>
    </div>

    <hr>

    <h2>Formulario de Contacto </h2>
    <form action="/proyectoGetPost/index.php" method="POST">
        <label for="nombre">Nombre Completo:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Ej. Nombre Apellido" required>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" required>

        <button type="submit">Enviar datos por POST</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = htmlspecialchars($_POST['nombre']);
        $email = htmlspecialchars($_POST['email']);

        echo "<div class='box post-box'>";
        echo "<strong> Datos Recibidos Correctamente en el Servidor:</strong>";
        echo "<p style='margin: 8px 0 0 0;'><strong>Nombre:</strong> " . $nombre . "</p>";
        echo "<p style='margin: 5px 0 0 0;'><strong>Correo electrónico:</strong> " . $email . "</p>";
        echo "</div>";
    }
    ?>

</body>
</html>