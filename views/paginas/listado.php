<div class="contenedor-anuncios">
<?php foreach ($propiedades as $propiedad){ ?>
        <div class="anuncio" data-cy='propiedades'>
            <img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Anuncio casa en el lago" data-cy='propiedad-imagen'>
            <div class="contenido-anuncio">
                <h3><?php echo $propiedad->titulo; ?></h3>
                <p><?php echo $propiedad->descripcion; ?></p>
                <p class="precio">$ <?php echo $propiedad->precio; ?></p>

                <ul class="iconos-caracteristicas" data-cy='propiedad-iconos'>
                    <li>
                        <img src="/build/img/icono_wc.svg" alt="icono wc" >
                        <p><?php echo $propiedad->wc; ?></p>
                    </li>
                    <li>
                        <img src="/build/img/icono_estacionamiento.svg" alt="icono autos">
                        <p><?php echo $propiedad->estacionamiento; ?></p>
                    </li>
                    <li>
                        <img src="/build/img/icono_dormitorio.svg" alt="icono habitaciones">
                        <p><?php echo $propiedad->habitaciones; ?></p>
                    </li>
                </ul>


                <a href="/propiedad?id=<?php echo $propiedad->id; ?>" class="boton-amarillo" data-cy='propiedad-boton'>Ver Propiedad</a>
            </div>
        </div>

<?php } ?>
    </div>