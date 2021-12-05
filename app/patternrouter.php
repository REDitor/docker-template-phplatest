<?php

class PatternRouter {

    private function stripParameters($uri) {
        if (str_contains($uri, '?')) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }
        return $uri;
    }

    public function route($uri) {
        $defaultcontroller = 'home';
        $defaultmethod = 'index';

        $uri = $this->stripParameters($uri); //gets the string after the ?
        $explodeUri = explode('/', $uri); //splits the string at /

        if (!isset($explodeUri[0]) || empty($explodeUri[0])) { //if no first param provided set it to 'home'
            $explodeUri[0] = $defaultcontroller;
        }
        $controllerName = $explodeUri[0]; //store the first param for later use in controller object

        if (!isset($explodeUri[1]) || empty($explodeUri[1])) { //if no second param provided set it to 'index'
            $explodeUri[1] = $defaultmethod;
        }
        $methodName = $explodeUri[1]; //store second param for later use in controller object

        try {
            require __DIR__ . '/controllers/' . $controllerName . '.php'; //require the class that is provided by name in $controllerName
            $controllerObj = new $controllerName(); // 1. create a new controller object matching the name provided in $controllerName
            $controllerObj->$methodName();          // 2. same thing for calling the method (handy trick i might add)
        } catch (Exception $e) {
            http_response_code(404);    //if either provided $controllerName or $methodName don't exist
        }                                           //as class or method with that corresponding name show error 404
    }
}