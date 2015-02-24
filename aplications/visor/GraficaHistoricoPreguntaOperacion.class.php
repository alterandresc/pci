<?php

class GraficaHistoricoPreguntaOperacion
{
  
  function executeConsult($params, $con)
  {
      $helper = new Helper();
      $dbProvider = new QueryBuilderEncuestas();
      $resultArray = array();
      $resultArray[] = array('Pregunta', 'P9', 'P10', 'P11', 'P12', 'P13','P14', 'P15', 'P16');
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
    $objetoGeneral = new GraficaGeneralOperacion();
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