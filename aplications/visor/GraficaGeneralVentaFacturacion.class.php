<?php

class GraficaGeneralVentaFacturacion
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
      $resultArray[] = array("P1" ,$totales[0]); 
      $resultArray[] = array("P2" ,$totales[1]);
      $resultArray[] = array("P3" ,$totales[2]);
      $resultArray[] = array("P4" ,$totales[3]);
      $resultArray[] = array("P5" ,$totales[4]);
      $resultArray[] = array("P7" ,$totales[5]);
      $resultArray[] = array("P20" ,$totales[6]);
      
      return $resultArray;
  }
  
  function obtenerTotalItemsComplementarios( $filters, $con)
  {
      $dbProvider = new QueryBuilderEncuestas();
      $sumaP1 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p1') ;
      $sumaP2 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p2' ) ;
      $sumaP3 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p3' ) ;
      $sumaP4 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p4' ) ;
      $sumaP5 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p5' ) ;
      $sumaP7 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p7' ) ;
      $sumaP20 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p20' );
      
      return array($sumaP1 ,$sumaP2,$sumaP3,$sumaP4,$sumaP5, $sumaP7, $sumaP20);
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