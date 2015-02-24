<?php

class CantidadProductos
{
  
  function executeConsult($params, $con)
  {
      $helper = new Helper();
      $dbProvider = new QueryBuilderEncuestas();
      $resultArray = array();
      
      $filters = $helper->buildFiltersForQuery($params);
      $cantidadResultados = $dbProvider->obtenerConteoResultados($filters,$con);
      $personas = $dbProvider->obtenerSumaColumna($filters,$con,'p34');
      
      if($cantidadResultados > 0)
      {
        $resultArray['productos'] = $personas/$cantidadResultados;
      }else
      {
        $resultArray['productos'] = 0;
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