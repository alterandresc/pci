<?php

class GraficaResumen
{

  function executeConsult($params, $con)
  {
      $helper = new Helper();
      $dbProvider = new QueryBuilderEncuestas();

      $resultArray = array();

      $filters = $helper->buildFiltersForQuery($params);
      $cantidadResultados = $dbProvider->obtenerConteoResultados($filters,$con);

      $resultArray[] = array("Pregunta",sprintf("Cumplimiento"));

      $totales = $this->obtenerTotalItemsComplementarios($filters, $con );

      if($cantidadResultados > 0)
      {
        $resultArray[] = array("Venta y Facturacion" ,$totales[0]); 
        $resultArray[] = array("Operación" ,$totales[1]);
        $resultArray[] = array("Imagen Personal" ,$totales[2]);
        $resultArray[] = array("Ambiente y Otros" ,$totales[3]); 
      }else
      {
        $resultArray[] = array("Venta y Facturacion" ,0); 
        $resultArray[] = array("Operación" ,0);
        $resultArray[] = array("Imagen Personal" ,0);
        $resultArray[] = array("Ambiente y Otros" ,0); 
      }

      return $resultArray;
  }

  function obtenerTotalItemsComplementarios( $filters, $con)
  {
    $facturacion = new GraficaPeriodolVentaFacturacion();
    $operacion = new GraficaPeriodolOperacion();
    $imagen = new GraficaPeriodoImagen();
    $ambiente = new GraficaPeriodoAmbiente();  

    $valor_facturacion = $facturacion->obtenerTotalItemsComplementariosCompleto($filters, $con);
    $valor_operacion = $operacion->obtenerTotalItemsComplementariosCompleto($filters, $con);
    $valor_imagen = $imagen->obtenerTotalItemsComplementariosCompleto($filters, $con);
    $valor_ambiente = $ambiente->obtenerTotalItemsComplementariosCompleto($filters, $con);

    return array($valor_facturacion/100, $valor_operacion/100, $valor_imagen/100, $valor_ambiente/100);
  }

  function calcularIndice($params, $con)
  {
    $helper = new Helper();
    list($facturacion, $operacion, $imagen, $ambiente) = $this->obtenerTotalItemsComplementarios($params, $con);
    $facturacion = $helper->aplicarRegla3(100,$helper->obtenerPesoVenta(), $facturacion);
    $operacion = $helper->aplicarRegla3(100,$helper->obtenerPesoOperacion(), $operacion);
    $imagen = $helper->aplicarRegla3(100,$helper->obtenerPesoImagen(), $imagen);
    $ambiente = $helper->aplicarRegla3(100,$helper->obtenerPesoAmbiente(), $ambiente);

    $indice = $facturacion + $operacion + $imagen + $ambiente;

    $indice = $indice * 100;
    if($indice > 100)
    {
      $indice = 100;
    }
    return $indice;
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