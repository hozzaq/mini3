<?php

/**
 * Class HomeController
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;

use Mini\Core\View;

class HomeController
{
    var $View;
   
    function __construct() {
        $this->View = new View();
    }
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        // html data
        $data["title"] = "Home"; /* for <title></title> inside header.php in this case */
        // load views
        $this->View->render('home/index', $data);
    }

    /**
     * PAGE: exampleone
     * This method handles what happens when you move to http://yourproject/home/exampleone
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function exampleOne()
    {
        // html data
        $data["title"] = "Example One"; /* for <title></title> inside header.php in this case */
        // load views
        $this->View->render('home/example_one', $data);
    }

    /**
     * PAGE: exampletwo
     * This method handles what happens when you move to http://yourproject/home/exampletwo
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function exampleTwo()
    {
        // html data
        $data["title"] = "Example Two"; /* for <title></title> inside header.php in this case */
        // load views
        $this->View->render('home/example_two', $data);
    }
}
