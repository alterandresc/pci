<?php

class GraficaIndiceReloj
{
  
  function executeConsult($params, $con)
  {
      $helper = new Helper();
      $dbProvider = new QueryBuilderEncuestas();

      
      $resultArray = array();
      
      $filters = $helper->buildFiltersForQuery($params);
      $cantidadResultados = $dbProvider->obtenerConteoResultados($filters,$con);
      
      $resultArray[] = array("Label","Value");
      
      
      $ultimoPeriodo = $params['periods'][sizeof($params['periods']) - 1];
      $tmpFilters = $filters;
      $tmpFilters['periods'] = array('tablename' => 'dt_popsy_incognito', 'valor' => array($ultimoPeriodo));
      
      
      $acumulado = $this->obtenerTotalItemsComplementarios($filters, $con );
      $ultimoMes = $this->obtenerTotalItemsComplementarios($tmpFilters, $con );
      
      if($cantidadResultados > 0)
      {
        $resultArray[] = array("Ultimo Mes", $ultimoMes);
        $resultArray[] = array("Acumulado", $acumulado);    
      }else
      {
        $resultArray[] = array("Ultimo Mes", 0);
        $resultArray[] = array("Acumulado", 0);
      }
      return $resultArray;
  }
  
  function obtenerTotalItemsComplementarios( $filters, $con)
  {
    $grafica_resumen = new GraficaResumen();
    return $grafica_resumen->calcularIndice( $filters, $con);
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