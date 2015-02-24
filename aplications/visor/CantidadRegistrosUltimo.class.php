<?php

class CantidadRegistrosUltimo
{
  
  function executeConsult($params, $con)
  {
      $helper = new Helper();
      $dbProvider = new QueryBuilderEncuestas();
      $resultArray = array();
      
      $filters = $helper->buildFiltersForQuery($params);
      $tmpFilters = $filters;
      $tmpFilters['periods'] = array('tablename' => 'dt_popsy_incognito', 'valor' => array($params['periods'][sizeof($params['periods'])-1]));
      $cantidadResultados = $dbProvider->obtenerConteoResultados($tmpFilters,$con);
      $resultArray['registros'] = $cantidadResultados;
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