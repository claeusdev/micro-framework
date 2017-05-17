<?php

/**
 *
 */
class App
{

  protected $controller = 'home';
  protected $method = 'index';
  protected $params = [];

  function __construct()
  {
    $url = $this->parseUrl();
    // Checking if Controller exists
    if(file_exists('../app/controllers/'. $url[0]. '.php'))
    {
      // Setting Controller to first array index or url
      $this->controller = $url[0];

      // Removing controller from array
      unset($url[0]);


    }

    require_once '../app/controllers/'. $this->controller . '.php';
    

    $this->controller = new $this->controller;

    if (method_exists($this->controller, $url[1])) {
      $this->method = $url[1];

      unset($url[1]);
    }

    $this->params = $url ?  array_values($url) : [];

    call_user_func_array( [$this->controller, $this->method], $this->params);
  }

  public function parseUrl()
  {
    // Checking if url is available
    if(isset($_GET['url']))
    {
      // Triming and exploding url
      return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
    }
  }
}
