<?php


class ResponseDispatcher
{
  private $paramsProcessor;
  private $conection ;
  private $rawParams = array();
  private $processedParams = array();
  
  
  public function respond($rawRequest)
  {
    $this->paramsProcessor = new paramsProcessor();
    $this->rawParams = $rawRequest;
    $this->processedParams = $this->paramsProcessor->getParams($this->rawParams);
    $this->conection = new Conection();
  
    $attendant = null;
    $response_type = "text/html";
    
    switch ($this->processedParams['destino'])
    {
        case 'total_preguntas':
                $attendant = new TotalEncuestas();
                break;
        case 'filtros':
                $attendant = new Filtros();
                break;
        case 'general_venta_facturacion':
                $attendant = new GraficaGeneralVentaFacturacion();
                break;
        case 'periodo_venta_facturacion':
                $attendant = new GraficaPeriodolVentaFacturacion();
                break;
        case 'general_operacion':
                $attendant = new GraficaGeneralOperacion();
                break;
        case 'general_imagen':
                $attendant = new GraficaGeneralImagen();
                break;
        case 'general_ambiente':
                $attendant = new GraficaGeneralAmbiente();
                break;
        case 'periodo_operacion':
                $attendant = new GraficaPeriodolOperacion();
                break;
        case 'periodo_imagen':
                $attendant = new GraficaPeriodoImagen();
                break;
        case 'periodo_ambiente':
                $attendant = new GraficaPeriodoAmbiente();
                break;
        case 'resumen_secciones':
                $attendant = new GraficaResumen();
                break;
        case 'grafica_reloj':
                $attendant = new GraficaIndiceReloj();
                break;
        case 'periodo_indice':
                $attendant = new GraficaPeriodoIndice();
                break;
        case 'cantidad_personas':
                $attendant = new CantidadPersonas();
                break;
        case 'cantidad_producto':
                $attendant = new CantidadProductos();
                break;
        case 'cantidad_registros':
                $attendant = new CantidadRegistros();
                break;
        case 'cantidad_registros_ultimo':
                $attendant = new CantidadRegistrosUltimo();
                break;
        case 'historico_preguntas_venta':
                $attendant = new GraficaHistoricoPreguntaVentaFacturacion();
                break;
        case 'historico_preguntas_operacion':
                $attendant = new GraficaHistoricoPreguntaOperacion();
                break;
        case 'historico_preguntas_imagen':
                $attendant = new GraficaHistoricoPreguntaImagen();
                break;
        case 'historico_preguntas_ambiente':
                $attendant = new GraficaHistoricoPreguntaAmbiente();
                break;
        case 'resumen_pila':
                $attendant = new GraficaResumenPila();
                break;
        case 'hoja_reporte':
                $attendant = new HojaReporte();
                break;
    }

    $result = $attendant->executeConsult($this->processedParams, $this->conection);
    if($attendant->getResponseType() != '')
    {
      header($attendant->getResponseType());
      echo $attendant->postProcess($result);
    }

    $this->conection->closeConection();
  }

}