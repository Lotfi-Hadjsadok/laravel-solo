<?php 
namespace Router;
class Router{
    
    public $url;
    public $routes = array();
    public function __construct(string $url)
    {
        $this->url = trim($url,'/');
    }
    public function get(string $path,array $controller){
        $this->routes['GET'][] = new Route($path,$controller);
    }
    public function run(){
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
            if($route->matches($this->url)){
                $route->execute();
            }
        }
        return header('Http/1.0 404 NOT FOUND');
    }
}