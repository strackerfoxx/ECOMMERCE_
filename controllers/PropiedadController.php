<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;


class PropiedadController {
    public static function index(Router $router) {

        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        $resultado = $_GET['resultado'] ?? null;

        
        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores'  => $vendedores

        ]);
    }

    public static function crear(Router $router){
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        // Arreglo con mensajes de errores
        $errores = Propiedad::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // crea una nueva instancia
    
            $propiedad = new Propiedad($_POST['propiedad']);
    
    
            /** SUBIDA DE ARCHIVOS */
    
                // Crear carpeta
                $carpetaImagenes = '../../imagenes/';
    
                if(!is_dir($carpetaImagenes)) {
                    mkdir($carpetaImagenes);
                }
    
                // Generar un nombre único
                $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
    
                //Setear la imagen
                //Realiza un resize a la imagen con intervention
    
                if($_FILES['propiedad']['tmp_name']['imagen']) {
                    $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                    $propiedad->setImagen($nombreImagen);
                }
    
                //validar       
            $errores = $propiedad->validar();
            
            if(empty($errores)) {
                    
    
            if(!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES);
            }    
    
                // Guarda la imagen en el servidor
             $image->save(CARPETA_IMAGENES . $nombreImagen);
    
                //guardar en la base de datos
                $resultado = $propiedad->crear();
                
                
                if($resultado) {
                    // Redireccionar al usuario.
                    header('Location: /admin?resultado=1');
                }
            }
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores'  => $vendedores,
            'errores' => $errores
        ]);
    }
    public static function actualizar(Router $router){

        $id = validarORedireccionar('/admin');
        $vendedores = Vendedor::all();
        $propiedad = Propiedad::find($id);

        $errores = Propiedad::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //asignar los atributos
            $args = $_POST['propiedad'];
    
            $propiedad->sincronizar($args);
    
            $errores = $propiedad->validar();
            
            // Generar un nombre único
            //subida de archivos
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
    
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen($nombreImagen);
            }
    
            if(empty($errores)) {
                if($_FILES['propiedad']['tmp_name']['imagen']){
                    //Almacenar la imagen
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $propiedad->guardar();
            }
        }

        $router->render('/propiedades/actualizar', [
            'propiedad' => $propiedad,
            'vendedores'  => $vendedores,
            'errores' => $errores
        ]);
    }


    public static function eliminar() {

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //validar id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
        
            if($id){
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
        }
    }
}
