<?php

class GraficaPeriodoImagen
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
      $dbProvider = new QueryBuilderEncuestas();
      
      $encuestas = $dbProvider->obtenerResultados( $filters, $con);
      $cantidadResultados = $dbProvider->obtenerConteoResultados($filters,$con);
      
      $suma_general = 0;
      
      foreach($encuestas as $encuesta)
      {
        $total_local = 0;
        $preguntas_validas = 6;
        $to_compare = array('p21' => 'p21','p22' => 'p22','p23' => 'p23','p24' => 'p24','p25' => 'p25','p26' => 'p26');
        if($encuesta['p21'] == "-1")
        {
          unset($to_compare['p21']);
          $preguntas_validas = $preguntas_validas-1;
        }
        if($encuesta['p23'] == "-1")
        {
          unset($to_compare['p23']);
          $preguntas_validas = $preguntas_validas-1;
        }
        $ponderado =  1 / $preguntas_validas;

        foreach($to_compare as $item => $val )
        {
          if($encuesta[$val] == '1' && $item != 'p22')
          {
            $total_local = $total_local + ($encuesta[$item] * $ponderado);
          }
          if($encuesta[$val] == '2' && $item == 'p22')
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