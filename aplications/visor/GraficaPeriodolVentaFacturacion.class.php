<?php

class GraficaPeriodolVentaFacturacion
{
  
  function executeConsult($params, $con)
  {
      $helper = new Helper();
      $dbProvider = new QueryBuilderEncuestas();
      $resultArray = array();
      $resultArray[] = array("Periodo", "");
      $filters = $helper->buildFiltersForQuery($params);
      $cantidadResultados = $dbProvider->obtenerConteoResultados($filters,$con);
      
      foreach($params['periods'] as $period )
      {
        $tmpFilters = $filters;
        $tmpFilters['periods'] = array('tablename' => 'dt_popsy_incognito', 'valor' => array($period));
        $period_result = $this->obtenerTotalItemsComplementariosCompleto($tmpFilters, $con);
        $cantidadResultados1 = $dbProvider->obtenerConteoResultados($tmpFilters,$con);
        $label = sprintf("%s ( %s datos)",$period,$cantidadResultados1);
        $resultArray[] = array($label,$period_result/100 );
      }
      
      if(sizeof($resultArray) < 2)
      {
        $resultArray = array("", 0);
      }

      return $resultArray;
  }
  
  function obtenerTotalItemsComplementariosCompleto( $filters, $con)
  {
      $general = new GraficaGeneralVentaFacturacion();
      $valores = $general->obtenerTotalItemsComplementarios($filters, $con);
      $to_return = array();
      
      foreach($valores as $valor)
      {
        $to_return[] = $valor * (100/7);
      }
      
      $sum  = array_sum($to_return);
      return $sum;
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