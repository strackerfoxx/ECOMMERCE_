<main class="contenedor seccion">
    <h1>Actualizar vendedor</h1>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <a href="/admin" class="boton boton-verde">Volver</a>

    

    <form class="formulario" method="post" enctype="multipart/form-data">
    <?php include __DIR__ . '/formulario_vendedores.php'; ?>

    <input type="submit" value="Actualizar vendedor" class="boton boton-verde">
    </form>
</main>