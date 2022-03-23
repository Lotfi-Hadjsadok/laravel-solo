<?php

namespace Router;

class Route
{
    public $path;
    public $action;
    public $matches;
    public function __construct(string $path, array $action)
    {
        $this->path = trim($path, '/');
        $this->action = $action;
    }
    public function matches(string $url)
    {
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $pathToMatch = "#^$path$#";
        if (preg_match($pathToMatch, $url, $matches)) {
            $this->matches = $matches;
            return true;
        }
    }

    public function execute()
    {
        $controller = new $this->action[0]();
        $method = $this->action[1];
        (isset($this->matches[1])) ? call_user_func_array(array($controller,$method), $this->matches) : $controller->$method();
    }
}
