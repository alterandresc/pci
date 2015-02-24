<?php

class GraficaPeriodoAmbiente
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
        $resultArray[] = array($label,$period_result /100);
      }
      
      if(sizeof($resultArray) < 2)
      {
        $resultArray = array("", 0);
      }

      return $resultArray;
  }
  
  function obtenerTotalItemsComplementariosCompleto( $filters, $con)
  {
      $dbProvider = new QueryBuilderEncuestas();
      $encuestas = $dbProvider->obtenerResultados( $filters, $con);
      $cantidadResultados = $dbProvider->obtenerConteoResultados($filters,$con);
      
      $suma_general = 0;
      foreach($encuestas as $encuesta)
      {
        $total_local = 0;
        $to_compare = array('p27' => 'p27','p28' => 'p28','p29' => 'p29','p30' => 'p30','p31' => 'p31','p32' => 'p32','p33' => 'p33');
        $preguntas_validas = sizeof($to_compare);
        if($encuesta['p28'] == "-1")
        {
          unset($to_compare['p28']);
          $preguntas_validas = $preguntas_validas-1;
        }
        if($encuesta['p29'] == "-1")
        {
          unset($to_compare['p29']);
          $preguntas_validas = $preguntas_validas-1;
        }
        if($encuesta['p30'] == "-1")
        {
          unset($to_compare['p30']);
          $preguntas_validas = $preguntas_validas-1;
        }
        $ponderado =  1 / $preguntas_validas;

        foreach($to_compare as $item => $val )
        {
          if($encuesta[$val] == '1')
          {
            $total_local = $total_local + ($encuesta[$item] * $ponderado);
          }
          if($encuesta[$val] == '2')
          {
            $total_local = $total_local + (($encuesta[$item]/2) * $ponderado);
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
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
//       $general = new GraficaGeneralAmbiente();
//       $valores = $general->obtenerTotalItemsComplementarios($filters, $con);
//       $to_return = array();
//       
//       foreach($valores as $valor)
//       {
//         $to_return[] = $valor * (100/7);
//       }
//       
//       $sum  = array_sum($to_return);
//       return $sum;
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