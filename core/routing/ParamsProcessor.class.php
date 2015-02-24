<?php


class ParamsProcessor
{
  public function getParams($request_params)
  {
    $params = array();
    
    foreach($request_params as $key => $value)
    {
      $params[$key] = $value;
    }
    
    return $params;
  }


}