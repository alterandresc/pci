<?php

class GraficaPeriodoIndice
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
        if($cantidadResultados1 > 0)
        {
          $resultArray[] = array($label,$period_result );
        }
      }

      if($cantidadResultados == 0)
      {
        $resultArray[] = array("", 0);
      }

      return $resultArray;
  }

  function obtenerTotalItemsComplementariosCompleto( $filters, $con)
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