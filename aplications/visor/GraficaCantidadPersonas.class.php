<?php

class CantidadPersonas
{
  
  function executeConsult($params, $con)
  {
      $helper = new Helper();
      $dbProvider = new QueryBuilderEncuestas();
      $resultArray = array();
      
      $filters = $helper->buildFiltersForQuery($params);
      $cantidadResultados = $dbProvider->obtenerConteoResultados($filters,$con);
      $personas = $dbProvider->obtenerSumaColumna($filters,$con, 'p18' );
      
      if($cantidadResultados > 0)
      {
        $resultArray['personas'] = $personas/$cantidadResultados;
      }else
      {
        $resultArray['personas'];
      }
      
      
      return $resultArray;
      
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