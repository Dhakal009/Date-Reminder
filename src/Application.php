<?php

namespace Acer\Remindate;

use Acer\Remindate\Controllers\RegistrationController;
use Acer\Remindate\Controllers\LoginController;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Application{
    private Environment  $twig;
       public array $routes = [
            'GET' => [
                '/' => 'Home',
                '/register' => [RegistrationController::class,'show'],
                '/login' => [LoginController::class, 'show'],
            ],
            'POST' => [
                '/register' => [RegistrationController::class, 'register'],
                '/login' => [LoginController::class, 'login'],
            ]
       ];
       public function __construct(){
           $loader = new FilesystemLoader(paths:__DIR__ . '/../views');
           $this->twig = new Environment(loader: $loader,options: []);
       }

       public function run():void{
            $path = $_SERVER['REQUEST_URI'];
            $method = $_SERVER['REQUEST_METHOD'];

            $route= $this->routes[$method][$path] ?? null;

            if($route) {
                $controllerClass = $route[0];
                $action = $route[1];
                $controller = new $controllerClass($this->twig);
                $controller->$action();
            }else {
                echo "404 Not Found";
            }
       }
}
?>