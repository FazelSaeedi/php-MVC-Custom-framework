<?php

namespace app\core;

class Response
{
  public function setStatusCode(int $code)
  {
     http_response_code($code);
  }

  public function Json(array $Array , $status)
  {

    // headers for not caching the results
    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 2022 05:00:00 GMT');

    // headers to tell that result is JSON
    header('Content-type: application/json');
    http_response_code(404);

    return json_encode($Array);

  }


}