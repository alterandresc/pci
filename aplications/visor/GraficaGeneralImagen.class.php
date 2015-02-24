<?php

class GraficaGeneralImagen
{
  
  function executeConsult($params, $con)
  {
      $helper = new Helper();
      $dbProvider = new QueryBuilderEncuestas();
      $resultArray = array();
      
      $filters = $helper->buildFiltersForQuery($params);
      $cantidadResultados = $dbProvider->obtenerConteoResultados($filters,$con);
      
      $resultArray[] = array("Pregunta",sprintf("Cumplimiento", $cantidadResultados));
      
      $p21Na = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10NA($filters,$con, 'p21');
      $p21Na = $helper->redondeado($p21Na,2);
      
      $p23Na = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10NA($filters,$con, 'p23');
      $p23Na = $helper->redondeado($p23Na,2);
      
      $totales = $this->obtenerTotalItemsComplementarios($filters, $con );
      if($cantidadResultados > 0)
      {
        if($totales[0] == 0)
        {
          $p0 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral01($filters,$con, 'p21');
          if($p0 == 0)
          {
            $resultArray[] = array("N/A" ,0); 
          }else
          {
            $resultArray[] = array("p21" ,$totales[0]); 
          }
        }else
        {
          $resultArray[] = array("p21" ,$totales[0]); 
        }

        $resultArray[] = array("P22" ,$totales[1]);
        if($totales[2] == 0)
        {
          $p0 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral01($filters,$con, 'p23');
          if($p0 == 0)
          {
            $resultArray[] = array("N/A" ,0); 
          }else
          {
            $resultArray[] = array("p23" ,$totales[2]); 
          }
        }else
        {
          $resultArray[] = array("p23" ,$totales[2]); 
        }
        $resultArray[] = array("P24" ,$totales[3]);
        $resultArray[] = array("P25" ,$totales[4]);
        $resultArray[] = array("P26" ,$totales[5]);
      }else
      {
        $resultArray[] = array("P21" ,0,0); 
        $resultArray[] = array("P22" ,0,0);
        $resultArray[] = array("P23" ,0,0);
        $resultArray[] = array("P24" ,0,0);
        $resultArray[] = array("P25" ,0,0);
        $resultArray[] = array("P26" ,0,0);
      }
      
      return $resultArray;
  }
  
  function obtenerTotalItemsComplementarios( $filters, $con)
  {
      $dbProvider = new QueryBuilderEncuestas();
      $sumaP9 =  $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p21') ;
      $sumaP10 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p22' ) ;
      $sumaP11 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p23' ) ;
      $sumaP12 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p24' ) ;
      $sumaP13 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p25' ) ;
      $sumaP14 = $dbProvider->obtenerSumaValidaPromediadaDePreguntaGeneral10($filters,$con, 'p26' ) ;
      
      return array($sumaP9 ,$sumaP10,$sumaP11,$sumaP12,$sumaP13, $sumaP14, );
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