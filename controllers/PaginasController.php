<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {
    public static function index(Router $router) {

        $propiedades = Propiedad::get(3);
        $inicio = true;
        
        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }
    public static function nosotros(Router $router){
        $router->render('paginas/nosotros', [
            
        ]);
    }
    public static function propiedades(Router $router){
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad(Router $router){

    $id = validarORedireccionar('/propiedades');

    //buscar propiedad por id
    $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }
    public static function blog(Router $router){


        $router->render('paginas/blog');
    }
    public static function entrada(Router $router){
        $router->render('paginas/entrada');
    }
    public static function contacto(Router $router){

        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $respuestas = $_POST['contacto'];

            // debugear($respuestas);
            //crear una instancia de phpmailer
            $mail = new PHPMailer();

            // Configurar smtp
            
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = 'true';
            $mail->Username = 'b1234b28b321fc';
            $mail->Password = 'b2b231749f9b73';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo Mensaje';

            // Habilitar htmlt
            $mail->isHTML = (true);
            $mail->Charset = 'UTF-8';

            // definir contenido
            $contenido = '<html>'; 
            $contenido .= '<p>Tienes un nuevo mensaje</p>'; 
            $contenido .= '<p>Mi nombre es: '. $respuestas['nombre'] .' </p>';
            $contenido .= '<p> y me gustaria hacer una: '. $respuestas['tipo'] .' </p>';
            $contenido .= '<p>Mensaje: '. $respuestas['mensaje'] .' </p>';
            $contenido .= '<p>Con un precio/presupuesto de: $'. $respuestas['precio'] .' </p>';

            // Enviar condicionalmente email o celularPhone
            if($respuestas['contacto'] === 'telefono'){
                $contenido .= '<p>Me gustaria que me contactes por: '. $respuestas['contacto'] .' </p>';
                $contenido .= '<p>Telefono: '. $respuestas['telefono'] .' </p>';
                $contenido .= '<p>Fecha para contcto: '. $respuestas['fecha'] .' </p>';
            $contenido .= '<p>y hora: '. $respuestas['hora'] .' </p>';
            }else{
                $contenido .= '<p>Email: '. $respuestas['email'] .' </p>';
            }

            $contenido .= '</html>';
            // debugear($contenido);

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin html';

            // Enviar el mail
            if(!$mail->send()){
                $mensaje = 'Hubo un Error... intente de nuevo';
            } else {
                $mensaje = 'Email enviado Correctamente';
            }

        }
        
        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}