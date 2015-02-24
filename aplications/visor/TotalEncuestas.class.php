<?php

class TotalEncuestas
{
  
  function executeConsult($params, $con)
  {
    $tablename = "fb_encuesta";
    $query = sprintf("SELECT count(*) as total from %s", $tablename);
    $result = $con->getConection()->query($query);
    $to_return = "";
    foreach ($result as $row) {
        //importante!! "total_encuestas" es el nombre con el que se recuperará en los javascripts
        $to_return['total_encuestas'] = $row['total'];
    }
    return $to_return;
  }
  
  function getResponseType()
  {
    return 'Content-Type: application/json';
  }
  
  function postProcess($result)
  {
    return json_encode($result);
  }

}