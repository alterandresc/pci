<?php

class GraficaGeneralAmbiente
{
  
  function executeConsult($params, $con)
  {
      $helper = new Helper();
      $dbProvider = new QueryBuilderEncuestas();
      $resultArray = array();
      
      $filters = $helper->buildFiltersForQuery($params);
      $cantidadResultados = $dbProvider->obtenerConteoResultados($filters,$con);
      
      $resultArray[] = array("Pregunta",sprintf("cumplimiento", $cantidadResultados));
      
      $totales = $this->obtenerTotalItemsComplementarios($filters, $con );
      $resultArray[] = array("P27" ,$totales[0]); 
      
      if($totales[1] == 0)
      {
        $p0 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral01($filters,$con, 'p28');
        if($p0 == 0)
        {
          $resultArray[] = array("N/A" ,0); 
        }else
        {
          $resultArray[] = array("P28" ,$totales[1]); 
        }
      }else
      {
        $resultArray[] = array("P28" ,$totales[1]); 
      }
      
      if($totales[2] == 0)
      {
        $p0 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral01($filters,$con, 'p29');
        if($p0 == 0)
        {
          $resultArray[] = array("N/A" ,0); 
        }else
        {
          $resultArray[] = array("P29" ,$totales[2]); 
        }
      }else
      {
        $resultArray[] = array("P29" ,$totales[2]); 
      }
      if($totales[3] == 0)
      {
        $p0 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral01($filters,$con, 'p30');
        if($p0 == 0)
        {
          $resultArray[] = array("N/A" ,0); 
        }else
        {
          $resultArray[] = array("P30" ,$totales[3]); 
        }
      }else
      {
        $resultArray[] = array("P30" ,$totales[3]); 
      }
      $resultArray[] = array("P31" ,$totales[4]);
      $resultArray[] = array("P32" ,$totales[5]);
      $resultArray[] = array("P33" ,$totales[6]);
      
      return $resultArray;
  }
  
  function obtenerTotalItemsComplementarios( $filters, $con)
  {
      $dbProvider = new QueryBuilderEncuestas();
      $sumaP9 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p27') ;
      $sumaP10 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p28' ) ;
      $sumaP11 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p29' ) ;
      $sumaP12 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p30' ) ;
      $sumaP13 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p31' ) ;
      $sumaP14 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p32' ) ;
      $sumaP15 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p33' );
      
      return array($sumaP9 ,$sumaP10,$sumaP11,$sumaP12,$sumaP13, $sumaP14, $sumaP15);
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