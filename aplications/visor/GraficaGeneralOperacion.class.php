<?php

class GraficaGeneralOperacion
{
  
  function executeConsult($params, $con)
  {
      $helper = new Helper();
      $dbProvider = new QueryBuilderEncuestas();
      $resultArray = array();
      
      $filters = $helper->buildFiltersForQuery($params);
      $cantidadResultados = $dbProvider->obtenerConteoResultados($filters,$con);
      
      $resultArray[] = array("Pregunta",sprintf("Cumplimiento", $cantidadResultados));
      
      $totales = $this->obtenerTotalItemsComplementarios($filters, $con );
      
      $paNa = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10NA($filters,$con, 'p9');
      $paNa = $helper->redondeado($paNa,2);
  
      if($totales[0] == 0)
      {
        $p0 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral01($filters,$con, 'p9');
        if($p0 == 0)
        {
          $resultArray[] = array("N/A" ,0); 
        }else
        {
          $resultArray[] = array("P9" ,$totales[0]); 
        }
      }else
      {
        $resultArray[] = array("P9" ,$totales[0]); 
      }
      $resultArray[] = array("P10" ,$totales[1]);
      $resultArray[] = array("P11" ,$totales[2]);
      $resultArray[] = array("P12" ,$totales[3]);
      $resultArray[] = array("P13" ,$totales[4]);
      $resultArray[] = array("P14" ,$totales[5]);
      $resultArray[] = array("P15" ,$totales[6]);
      $resultArray[] = array("P16" ,$totales[7]);
      
      return $resultArray;
  }
  
  function obtenerTotalItemsComplementarios( $filters, $con)
  {
      $dbProvider = new QueryBuilderEncuestas();
      $sumaP9 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p9') ;
      $sumaP10 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p10' ) ;
      $sumaP11 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p11' ) ;
      $sumaP12 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p12' ) ;
      $sumaP13 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p13' ) ;
      $sumaP14 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p14' ) ;
      $sumaP15 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p15' );
      $sumaP16 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p16' );
      
      return array($sumaP9 ,$sumaP10,$sumaP11,$sumaP12,$sumaP13, $sumaP14, $sumaP15,$sumaP16);
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