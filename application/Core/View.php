<?php
 
/*
 
First, MINI3 is great, very easy to understand, great work
 
I made this View class to fit what I want to accomplish
 
Why? Let me explain
 
What about if you rename header.php file? Then you need to change a lot of code parts
What about an ajax call? Doesn't need header and footer, so..
What about if you want to call a controler/method from a View file?
 
*/
 
// file - application/Core/View.php
 
namespace Mini\Core;
 
class View
{
    public function render($filename, $data = null, $template = true)
    {
        if ($data) {
            foreach ($data as $key => $value) {
                $this->{$key} = $value;
            }
        }
       
        if ($template == true) {
            require APP . 'view/_templates/header.php';
        }
       
        require APP . 'view/'.$filename.'.php';
       
        if ($template == true) {
            require APP . 'view/_templates/footer.php';
        }
    }
   
    public function requestAction($datos) {
        $url = "http:".URL.$datos; // doesn't work without http:
       
        $cookies = "";
       
        foreach($_COOKIE as $a => $b) {
            $cookies .= $a."=".$b."; ";
        }
       
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_COOKIE, $cookies);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36");
        $result = curl_exec($ch);
        curl_close($ch);
       
        return $result;
    }
}
