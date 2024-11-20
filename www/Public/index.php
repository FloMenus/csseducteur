<?php

spl_autoload_register("myAutoLoader");

function myAutoLoader(string $class){
    $pathClass = "../" . str_ireplace(["App\\", "\\"], ["", "/"], $class) . ".php";
    if(file_exists($pathClass)){
        require $pathClass;
    }
}

$url = strtok(trim($_SERVER["REQUEST_URI"]), "?");
$routesPath = "./../routes.yml";

if(file_exists($routesPath)){
    $routes = yaml_parse_file($routesPath);

    if(isset($routes[$url]))
    {
        $controller = "App\\Controllers\\" . $routes[$url]["controller"] . ".php";
    
        require "../Controllers/" . $routes[$url]["controller"] . ".php";
    
        if(class_exists($controller))
        {
            $method = $routes[$url]["method"];

            $controller = new $controller();
        
            if(method_exists($controller, $method))
            {
                $controller->$method();
            }
        }
    } else {
        echo "404";
    }
} else {

}



function pptr($elt): void 
{
    echo "<pre>";
    print_r($elt);
    echo "</pre>";        
}