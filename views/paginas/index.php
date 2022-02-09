<main class="contenedor seccion">
        <h2 data-cy='heading-us'>More About Us</h2>
            
        <?php include 'iconos.php'; ?>    
        
    </main>

    <section class="seccion contenedor">
        <h2 data-cy='header-propiedades'>Casas y Departamentos en Venta</h2>

            <?php include 'listado.php' ?>

        <div class="alinear-derecha">
            <a href="/propiedades" class="boton-verde" data-cy="todas-propiedades">Ver todas</a>
        </div>
    </section>

    <section class="imagen-contacto" data-cy="find-house">
        <h2 >Find the home of your dreams</h2>
        <p >Find out the contact form and an advisor will contact you shortly</p>
        <a href="/contacto" class="boton-amarillo" data-cy="boton-find">Contact us</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p>Escrito el: <span>20/10/2021</span> por: <span>Stracker Foxx &copy;</span></p>
                    
                        <p>
                            Consejos para construir una terraza 
                        </p>
                    
                    </a>
                </div>
            </article>


            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>guia para la decoracion de tu hogar</h4>
                        <p>Escrito el: <span>20/10/2021</span> por: <span>Stracker Foxx &copy;</span></p>
                    
                        <p>
                        </p>
                    
                    </a>
                </div>
            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comporto de una excelente forma muy buena atencion 
                    y la casa que me ofrecieron cumple con todas mis espectativas
                </blockquote>
                <p>. Anonimo</p>
            </div>
        </section>
    </div>