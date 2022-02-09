<?php
    if(!isset($_SESSION)){
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
    
    <header class="header <?php echo isset( $inicio ) ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="../build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img src="../build/img/barras.svg" alt="icono menu">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="../build/img/dark-mode.svg" alt="boton dark mode">
                    <nav class="navegacion mostrar">
                        <a href="/nosotros">nosotros</a>
                        <a href="/propiedades">anuncios</a>
                        <a href="/blog">blog</a>
                        <a href="/contacto">contacto</a>
                        <?php if($auth): ?>
                            <a href="/admin">admin</a>
                            <a href="/logout">cerrar sesion</a>
                        <?php endif; ?>
                        <?php if(!$auth): ?>
                            <a href="/login">login</a>
                        <?php endif; ?>
                    </nav>
                </div>
                </div>
                
            </div> <!--.barra-->

            
        </div>
    </header>


    <?php echo $contenido; ?>


    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros">nosotros</a>
                <a href="anuncios">anuncios</a>
                <a href="blog">blog</a>
                <a href="contacto">contacto</a>
            </nav>
        </div>

        <p class="copyright">Todos los derechos reservados para Stracker Foxx &copy;</p>
    </footer>

    <script src="../build/js/bundle.min.js"></script>
</body>
</html>