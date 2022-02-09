<main class="contenedor">
    <h1>Iniciar Sesion</h1>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" class="formulario" action="/login">
    <fieldset>
                <legend>Email y Password</legend>

                <label for="email">E-mail</label>
                <!-- required -->
                <input type="email" name="email" placeholder="Tu Email" id="email" >

                <label for="password">password</label>
                <!-- required -->
                <input type="password" name="password" placeholder="Tu password" id="password">

            </fieldset>
            <input type="submit" value="Login" class="boton boton-verde">
    </form>
</main>