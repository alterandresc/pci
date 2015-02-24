<?php

class HojaReporte
{
  function hallarNivel($n_p1)
  {
          if($n_p1 >= 80)
          {
                  $n_p1 = "ALTO";
          }elseif($n_p1 >= 60)
          {
                  $n_p1 = "MEDIO";
          }elseif($n_p1 < 60)
          {
                  $n_p1 = "BAJO";
          }
          return $n_p1; 
  }

  function executeConsult($params, $con)
  {
      $helper = new Helper();
      $dbProvider = new QueryBuilderEncuestas();
      $resultArray = array();
      $query_tiendas = "SELECT * FROM `relaciones` ";
      $query_tiendas_result = $con->getConection()->query($query_tiendas);
      $grafica_general = new GraficaResumen();
      $grafica_venta_facturacion = new  GraficaGeneralVentaFacturacion();
      $grafica_operacion = new GraficaGeneralOperacion();
      $grafica_imagen =  new GraficaGeneralImagen();
      $grafica_ambiente = new GraficaGeneralAmbiente();
      $cabeceras = array("Punto","Indice","P1","P2","P3","P4","P5","P7","P9","P10","P11","P12","P13","P14","P15","P16","P21","P22","P23","P24","P25","P26","P27","P28","P29","P30","P31","P32","P33");
      $head = "<table><tr>";
      foreach($cabeceras as $cabecera)
      {
        $head = $head."<td>".$cabecera."</td>";
      }
      $head = $head."</tr>";
      echo $head;
      foreach ($query_tiendas_result as $row)
      {
        $n_params = $params;
//         $n_params['c_costo_id'] = "6203-301";6206-307
        $n_params['c_costo_id'] = $row['c_costo_id'];
        $n_p_params = $helper->buildFiltersForQuery($n_params);
        $g_venta = $grafica_venta_facturacion->obtenerTotalItemsComplementarios($n_p_params,$con);
        $g_operacion = $grafica_operacion->obtenerTotalItemsComplementarios($n_p_params,$con);
        $g_imagen = $grafica_imagen->obtenerTotalItemsComplementarios($n_p_params,$con);
        $g_ambiente = $grafica_ambiente->obtenerTotalItemsComplementarios($n_p_params,$con);
        $resultArray[$row['c_costo_id']]['nombre'] = $row['c_costo_nombre'];
        $resultArray[$row['c_costo_id']]['general'] = $grafica_general->calcularIndice($n_p_params,$con);
        $resultArray[$row['c_costo_id']]['p1'] = $this->hallarNivel($g_venta[0] * 100);
        $resultArray[$row['c_costo_id']]['p2'] = $this->hallarNivel($g_venta[1] * 100);
        $resultArray[$row['c_costo_id']]['p3'] = $this->hallarNivel($g_venta[2] * 100);
        $resultArray[$row['c_costo_id']]['p4'] = $this->hallarNivel($g_venta[3] * 100);
        $resultArray[$row['c_costo_id']]['p5'] = $this->hallarNivel($g_venta[4] * 100);
        $resultArray[$row['c_costo_id']]['p7'] = $this->hallarNivel($g_venta[5] * 100);

        $resultArray[$row['c_costo_id']]['p9'] = $this->hallarNivel($g_operacion[0] * 100);
        $resultArray[$row['c_costo_id']]['p10'] = $this->hallarNivel($g_operacion[1] * 100);
        $resultArray[$row['c_costo_id']]['p11'] = $this->hallarNivel($g_operacion[2] * 100);
        $resultArray[$row['c_costo_id']]['p12'] = $this->hallarNivel($g_operacion[3] * 100);
        $resultArray[$row['c_costo_id']]['p13'] = $this->hallarNivel($g_operacion[4] * 100);
        $resultArray[$row['c_costo_id']]['p14'] = $this->hallarNivel($g_operacion[5] * 100);
        $resultArray[$row['c_costo_id']]['p15'] = $this->hallarNivel($g_operacion[6] * 100);
        $resultArray[$row['c_costo_id']]['p16'] = $this->hallarNivel($g_operacion[7] * 100);

        $resultArray[$row['c_costo_id']]['p21'] = $this->hallarNivel($g_imagen[0] * 100);
        $resultArray[$row['c_costo_id']]['p22'] = $this->hallarNivel($g_imagen[1] * 100);
        $resultArray[$row['c_costo_id']]['p23'] = $this->hallarNivel($g_imagen[2] * 100);
        $resultArray[$row['c_costo_id']]['p24'] = $this->hallarNivel($g_imagen[3] * 100);
        $resultArray[$row['c_costo_id']]['p25'] = $this->hallarNivel($g_imagen[4] * 100);
        $resultArray[$row['c_costo_id']]['p26'] = $this->hallarNivel($g_imagen[5] * 100);

        $resultArray[$row['c_costo_id']]['p27'] = $this->hallarNivel($g_ambiente[0] * 100);
        $resultArray[$row['c_costo_id']]['p28'] = $this->hallarNivel($g_ambiente[1] * 100);
        $resultArray[$row['c_costo_id']]['p29'] = $this->hallarNivel($g_ambiente[2] * 100);
        $resultArray[$row['c_costo_id']]['p30'] = $this->hallarNivel($g_ambiente[3] * 100);
        $resultArray[$row['c_costo_id']]['p31'] = $this->hallarNivel($g_ambiente[4] * 100);
        $resultArray[$row['c_costo_id']]['p32'] = $this->hallarNivel($g_ambiente[5] * 100);
        $resultArray[$row['c_costo_id']]['p33'] = $this->hallarNivel($g_ambiente[6] * 100);

        echo "<tr>";
        foreach($resultArray[$row['c_costo_id']] as $item)
        {
          echo "<td>".$item."</td>";

        }
        echo "</tr>";
      }
      echo "</table>";
      return $resultArray;
  }

  function obtenerTotalItemsComplementariosCompleto( $filters, $con)
  {
    $grafica_resumen = new GraficaResumen();
    return $grafica_resumen->calcularIndice( $filters, $con);
  }

  function getResponseType()
  {
    return '';
  }

  function postProcess($result)
  {
    return ($result);
  }

}