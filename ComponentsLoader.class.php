<?php 

class ComponentsLoader
{
  private $core_files = array ("core/database/Conection.class.php",
                               "core/routing/ParamsProcessor.class.php",
                               "core/routing/ResponseDispatcher.class.php");

  private $aplications_files = array ( "aplications/visor/Helper.class.php",
                                      "aplications/visor/QueryBuilderEncuestas.class.php",
                                      "aplications/visor/TotalEncuestas.class.php",
                                      "aplications/visor/Filtros.class.php",
                                      "aplications/visor/GraficaGeneralVentaFacturacion.class.php",
                                      "aplications/visor/GraficaGeneralOperacion.class.php",
                                      "aplications/visor/GraficaGeneralAmbiente.class.php",
                                      "aplications/visor/GraficaGeneralImagen.class.php",
                                      "aplications/visor/GraficaPeriodolVentaFacturacion.class.php",
                                      "aplications/visor/GraficaPeriodolOperacion.class.php",
                                      "aplications/visor/GraficaPeriodoImagen.class.php",
                                      "aplications/visor/GraficaPeriodoAmbiente.class.php",
                                      "aplications/visor/GraficaResumen.class.php",
                                      "aplications/visor/GraficaIndiceReloj.class.php",
                                      "aplications/visor/GraficaPeriodoIndice.class.php",
                                      "aplications/visor/CantidadPersonas.class.php",
                                      "aplications/visor/CantidadProductos.class.php",
                                      "aplications/visor/CantidadRegistros.class.php",
                                      "aplications/visor/CantidadRegistrosUltimo.class.php",
                                      "aplications/visor/GraficaHistoricoPreguntaVentaFacturacion.class.php",
                                      "aplications/visor/GraficaHistoricoPreguntaOperacion.class.php",
                                      "aplications/visor/GraficaHistoricoPreguntaImagen.class.php",
                                      "aplications/visor/GraficaHistoricoPreguntaAmbiente.class.php",
                                      "aplications/visor/GraficaResumenPila.class.php",
                                      "aplications/visor/reports/HojaReporte.class.php");
  
  public function loadCoreFiles()
  {
    foreach($this->core_files as $coreFile)
    {
      require_once($coreFile);
    }
  }
  
  public function loadAplicationsFiles()
  {
    foreach($this->aplications_files as $aplications_file)
    {
      require_once($aplications_file);
    }
  }
  
  public function loadAll()
  {
    $this->loadCoreFiles();
    $this->loadAplicationsFiles();
  }
}