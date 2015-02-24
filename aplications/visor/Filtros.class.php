<?php

class Filtros
{
  
  function executeConsult($params, $con)
  {
    if($params['filtros_por'] == 'pais_ini')
    {
      return $this->initPaises($params, $con);
    }else
    {
      return $this->getNewFilterswithParams($params, $con);
    }
  }
  
  function getNewFilterswithParams($params, $con)
  {
    if(!isset($params['multi_constraints']))
    {
      $tablename = "relaciones";
      $obtener = $params['obtener'];
      if(isset($params['llave']))
      {
        $obtener = $params['llave']."`,`".$params['obtener'];
      }
      $query = sprintf("SELECT DISTINCT  `%s`  FROM `%s` WHERE `%s` = '%s' ",$obtener, $tablename, $params['filtros_por'], $params['valor']);
      $result = $con->getConection()->query($query);
      
      $to_return = array();
      foreach ($result as $row) {
        if(isset($params['llave']))
        {
          $to_return[$params['retornar']][] = array($params['obtener'] => $row[$params['obtener']], $params['llave'] => $row[$params['llave']]  );
        }
        else
        {
        $to_return[$params['retornar']][] = $row[$params['obtener']];
        }
      }
      return $to_return;
    }
  }
   
  function initPaises($params, $con)
  {
    $tablename = "relaciones";
    $query = sprintf("SELECT DISTINCT  `pais`  FROM `%s` ", $tablename);
    $result = $con->getConection()->query($query);

    $to_return = array();
    foreach ($result as $row) {
        $to_return['paises'][] = $row['pais'];
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