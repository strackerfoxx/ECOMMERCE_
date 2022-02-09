<?php

namespace MVC;

class Router {

    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }
    public function post($url, $fn){
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas() {

        session_start();

        $auth = $_SESSION['login'] ?? null;

        //areglo de rutas protegidas
        $rutas_protegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/vendedores/crear', '/vendedores/actualizar',
        '/vendedores/eliminar', '/propiedades/eliminar'
        ];


        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo == 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null ;
        }else {
            $fn = $this->rutasPOST[$urlActual] ?? null ;
        }

        // Proteger las rutas
        if(in_array($urlActual,$rutas_protegidas) && !$auth){
            header('Location: /');
        }

        if($fn){
            // la url existe y hay una funcion
            call_user_func($fn, $this);
        }else{
            echo "ERROR 404";
        }
    }

    // Muestra una vista
    public function render($view, $datos = []){

        foreach($datos as $key => $value){
            $$key = $value;   
        }

        ob_start();

        include __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean();

        include __DIR__ . "/views/layout.php";
    }
    
}