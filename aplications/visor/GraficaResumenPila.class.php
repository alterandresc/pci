<?php

class GraficaResumenPila
{

  function executeConsult($params, $con)
  {
    $helper = new Helper();
    $dbProvider = new QueryBuilderEncuestas();


    $resultArray = array();

    $filters = $helper->buildFiltersForQuery($params);
    $cantidadResultados = $dbProvider->obtenerConteoResultados($filters,$con);

    $resultArray[] = array('', 'Venta y Facturación', 'Operación', 'Imagen Personal', 'Ambiente y Otros');
    $resultArray[] = array('', 50, 16.6, 16.6, 16.6);

    $totales = $this->obtenerTotalItemsComplementarios($filters, $con );

    if($cantidadResultados > 0)
    {
      $resultArray[] = array("" ,$totales[0],$totales[1],$totales[2],$totales[3]);  
    }else
    {
      $resultArray[] = array('',0, 0,0, 0);
    }

    return $resultArray;
  }

  function obtenerTotalItemsComplementarios( $filters, $con)
  {
    $helper = new Helper();
    $facturacion = new GraficaPeriodolVentaFacturacion();
    $operacion = new GraficaPeriodolOperacion();
    $imagen = new GraficaPeriodoImagen();
    $ambiente = new GraficaPeriodoAmbiente();  

    $valor_facturacion = $facturacion->obtenerTotalItemsComplementariosCompleto($filters, $con);
    $valor_operacion = $operacion->obtenerTotalItemsComplementariosCompleto($filters, $con);
    $valor_imagen = $imagen->obtenerTotalItemsComplementariosCompleto($filters, $con);
    $valor_ambiente = $ambiente->obtenerTotalItemsComplementariosCompleto($filters, $con);

    return array($helper->redondeado($valor_facturacion/2,2), $helper->redondeado(($valor_operacion/2)/3,2), $helper->redondeado(($valor_imagen/2)/3,2), $helper->redondeado(($valor_ambiente/2)/3,2));
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