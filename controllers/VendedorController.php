<?php

namespace Controllers;
use MVC\Router;
use Model\Vendedor;

class VendedorController {
    public static function index(Router $router) {

        $vendedores = vendedor::all();
        $vendedores = Vendedor::all();
        $resultado = $_GET['resultado'] ?? null;

        
        $router->render('vendedores/admin', [
            'vendedores' => $vendedores,
            'resultado' => $resultado,
            'vendedores'  => $vendedores

        ]);
    }

    public static function crear(Router $router){
        $vendedores = new Vendedor;
        // Arreglo con mensajes de errores
        $errores = Vendedor::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // crea una nueva instancia
            
            $vendedor = new Vendedor($_POST['vendedor']);

            //validar       
            $errores = $vendedor->validar();
            
            if(empty($errores)) {  

                //guardar en la base de datos
                $resultado = $vendedor->crear();

                if($resultado) {
                    // Redireccionar al usuario.
                    header('Location: /admin?resultado=1');
                }
            }
        }

        $router->render('vendedores/crear', [
            'vendedor'  => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        $id = validarORedireccionar('/admin');

        // Obtener los datos de la propiedad
        $vendedor = Vendedor::find($id);

        // Arreglo con mensajes de errores
        $errores = Vendedor::getErrores();

        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

                // Asignar los atributos
                $args = $_POST['vendedor'];
                $vendedor->sincronizar($args);

                // Validación
                $errores = $vendedor->validar();
                
                if(empty($errores)) {

                    // Guarda en la base de datos
                    $resultado = $vendedor->guardar();

                    if($resultado) {
                        header('location: /admin');
                    }
                }
        }

        $router->render('vendedores/actualizar', [
            'vendedor' => $vendedor,
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
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }
            }
        }
    }
}