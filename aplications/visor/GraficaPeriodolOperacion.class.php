<?php

class GraficaPeriodolOperacion
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
//       $general = new GraficaGeneralOperacion();
      $dbProvider = new QueryBuilderEncuestas();
//       $valores = $general->obtenerTotalItemsComplementarios($filters, $con);
      
      $encuestas = $dbProvider->obtenerResultados( $filters, $con);
      $cantidadResultados = $dbProvider->obtenerConteoResultados($filters,$con);
      
      $suma_general = 0;
      
      foreach($encuestas as $encuesta)
      {
        $total_local = 0;
        $ponderado =  1/8;
        $to_compare = array('p9','p10','p11','p12','p13', 'p14', 'p15', 'p16');
        if($encuesta['p9'] == "-1")
        {
          $to_compare = array('p10','p11','p12','p13', 'p14', 'p15', 'p16');
          $ponderado =  1/7;
        }
        
        foreach($to_compare as $item )
        {
          if($encuesta[$item] == '1')
          {
            $total_local = $total_local + ($encuesta[$item] * $ponderado);
          }
        }
        $suma_general = $suma_general + $total_local;
      }
      
      $total = 0;
      if($cantidadResultados > 0)
      {
        $total = $suma_general /$cantidadResultados;
      }
      return $total*100;
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