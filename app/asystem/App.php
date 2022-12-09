<?php

class App
{
    protected $nowPath;
    protected $nowMethod;
    protected static $routes = [];

    // protected $home;

    public function __construct($config)
    {
        $this->nowPath = $_SERVER['REQUEST_URI'];
        $this->nowPath = $_SERVER['REQUEST_METHOD'];
        $this->home = $config;
        $this->startRoute();
    }

    public static function getAction($link, $path, $auth = false, $area = null)
    {
        self::$routes[] = ['GET', $link, $path, $area, $auth];
    }

    public static function postAction($link, $path, $auth = false, $area = null)
    {
        self::$routes[] = ['POST', $link, $path, $area, $auth];
    }

    public function startRoute()
    {
        foreach (self::$routes as $routes) {
            print_r($routes);
            //List metodu ile ayrıştırma işlemi
            list($method, $link, $path, $area, $auth) = $routes;
//           echo $method . "<br>" .$link . "<br>" . $path . "<br>";
            echo "<br>";
            echo $methodCheck = $this->nowMethod == $method;
            echo "<br>";
            // link ile path karsilastirilip $params olarak aktarma
            $pathCheck = preg_match("@^($link)$@", $this->nowPath, $params);
//            echo $pathCheck;
            if ($methodCheck && $pathCheck) {
                echo $path;

                $uri = explode("/", $path);
//                echo "<pre>";
//                print_r($uri);
                array_shift($uri);
                list($activeModul, $activeMethod) = $uri;
                echo $activeModul;
                echo "<br>";
                echo $activeMethod;
            }
        }
    }
}