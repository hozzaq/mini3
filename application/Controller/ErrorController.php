<?php

/**
 * Class Error
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller; 

use Mini\Core\View;

class ErrorController
{
    var $View;
   
    function __construct() {
        $this->View = new View();
    }
    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
    public function index()
    {
        // html data
        $data["title"] = "ERROR"; /* for <title></title> inside header.php in this case */
       // load views
        $this->View->render('error/index', $data);
    }
}
