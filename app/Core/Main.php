<?php

namespace App\Core;

// for new router
use Application\Controllers\HomepageController\HomepageController;

/**
 * your router
 */
class Main
{
  public function start()
  {
    // https://www.youtube.com/watch?v=D93K7ztR58s&list=PLBq3aRiVuwyx6B9sJip_ZU1lt7jjCwsMJ&index=7
    // we remove the trailing slash
    // get url
    $uri = $_SERVER['REQUEST_URI'];

    // avoid duplicate content with / at the end of $uri
    if (!empty($uri) && $uri!= '/' &&  $uri[-1] === "/") {
      $uri = substr($uri, 0, -1);

      // redirection without /
      http_response_code(301);
      header('Location: ') . $uri;
    }

// param
//p=controleur/mrhode/param
$params = explode('/', $_GET['p']};
var_dump($params);

 if($params[0] != ''){







 }else{
  //// not params : homepage
  // instenciation
  $controller = new HomepageController;

  // metode
  $controller->execute();
 


}
 