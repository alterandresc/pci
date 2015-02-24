<?php

class GraficaHistoricoPreguntaAmbiente
{
  
  function executeConsult($params, $con)
  {
      $helper = new Helper();
      $dbProvider = new QueryBuilderEncuestas();
      $resultArray = array();
      $resultArray[] = array('Pregunta', 'P27', 'P28', 'P29', 'P30', 'P31','P32','P33');
      $filters = $helper->buildFiltersForQuery($params);
      $cantidadResultados = $dbProvider->obtenerConteoResultados($filters,$con);
      
      foreach($params['periods'] as $period )
      {
        $tmpFilters = $filters;
        $tmpFilters['periods'] = array('tablename' => 'dt_popsy_incognito', 'valor' => array($period));
        $period_result = $this->obtenerTotalItemsComplementariosCompleto($tmpFilters, $con);
        $cantidadResultados1 = $dbProvider->obtenerConteoResultados($tmpFilters,$con);
        $label = sprintf("%s ( %s datos)",$period,$cantidadResultados1);
        $partial_array = array_merge(array($label),$period_result);
        $resultArray[] = $partial_array;
      }
      
      if(sizeof($resultArray) < 2)
      {
        $resultArray = array('Pregunta',0,0,0,0,0,0, 0);
      }

      return $resultArray;
  }
  
  function obtenerTotalItemsComplementariosCompleto( $filters, $con)
  {
    $objetoGeneral = new GraficaGeneralAmbiente();
    $cumplimiento =  $objetoGeneral->obtenerTotalItemsComplementarios($filters, $con);
    return $cumplimiento;
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