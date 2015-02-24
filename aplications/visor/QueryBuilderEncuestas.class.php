<?php

  class QueryBuilderEncuestas
  {
      public function obtenerQueryPeriodos($periodos , $tablename = "dt_popsy_incognito" , $opt = "no_and")
      {
              $periodosQuery = "";
              if(!empty($periodos))
              {
                      $periodosQuery ="and (";
                      if($opt == "no_and")
                      {
                              $periodosQuery ="(";
                      }
                      $subQueries = array();
                      foreach($periodos as $periodo)
                      {
                              $fecha = $periodo;
                              $fecha =  explode("-",$fecha); 
                              $anio = $fecha[0];
                              $mes = $fecha[1];
                              $subQueries[] = sprintf("( `%s`.`anio` =  %s AND `%s`.`mes` = %s)",$tablename,$anio,$tablename,$mes);
                      }
                      $preQuery = implode(" or ",$subQueries);
                      $periodosQuery = $periodosQuery.$preQuery.")";
              }
              else
              {
                      $periodosQuery = sprintf(" AND `%s`.`anio` = '' AND `%s`.`mes` = ''", $tablename,$tablename);
                      if($opt == "no_and")
                      {
                              $periodosQuery = sprintf("`%s`.`anio` = '' AND `%s`.`mes` = ''",$tablename,$tablename);
                      }
              }
              return $periodosQuery; 
      }

      public function obtenerQueryAtributo($tablename, $nombre, $valor)
      {
              $queryAtributo = "";
              if($valor != 'todo')
              {
                      $queryAtributo = sprintf(" and  `%s`.`%s` = '%s'",$tablename, $nombre, $valor);
              }
              return $queryAtributo; 
      }

      public function buildQueryDependingOnFilters($filters)
      {
        $Wholequery = "";
        foreach($filters as $filter => $confs)
        {
          if($filter != "periods")
          {
            $Wholequery.=$this->obtenerQueryAtributo($confs['tablename'], $filter, $confs['valor']);
          }
        }

        return $Wholequery;
      }

      public function BuildWholeFiltersQuery($filters)
      {
        $periodsQuery = $this->obtenerQueryPeriodos($filters['periods']['valor'],$filters['periods']['tablename']);
        $filtersQuery = $this->buildQueryDependingOnFilters($filters);

        return $periodsQuery.$filtersQuery;
      }

      public function obtenerQueryConteoResultados($filters)
      {
          $baseQuery = " SELECT count( DISTINCT (`relaciones`.`c_costo_id`)) as total
                        FROM `dt_popsy_incognito`
                        LEFT JOIN `relaciones` ON `dt_popsy_incognito`.`pdv_id` = `relaciones`.`c_costo_id` WHERE";

         $wholeQuery = $baseQuery.$this->BuildWholeFiltersQuery($filters);

         return $wholeQuery;
      }

      public function obtenerQueryResultados($filters)
      {
          $baseQuery = " SELECT *
                        FROM `dt_popsy_incognito`
                        LEFT JOIN `relaciones` ON `dt_popsy_incognito`.`pdv_id` = `relaciones`.`c_costo_id` WHERE";

         $wholeQuery = $baseQuery.$this->BuildWholeFiltersQuery($filters);

         return $wholeQuery;
      }

      public function obtenerQuerySumaColumna($filters, $columna)
      {
          $baseQuery = sprintf(" SELECT SUM(`%s`) as total
                        FROM `dt_popsy_incognito`
                        LEFT JOIN `relaciones` ON `dt_popsy_incognito`.`pdv_id` = `relaciones`.`c_costo_id` WHERE",$columna);

         $wholeQuery = $baseQuery.$this->BuildWholeFiltersQuery($filters);

         return $wholeQuery;
      }

      public function obtenerQueryDistinctColumna($filters, $columna)
      {
          $baseQuery = sprintf(" SELECT DISTINCT  `%s`
                        FROM `dt_popsy_incognito`
                        LEFT JOIN `relaciones` ON `dt_popsy_incognito`.`pdv_id` = `relaciones`.`c_costo_id` WHERE",$columna);

         $wholeQuery = $baseQuery.$this->BuildWholeFiltersQuery($filters);

         return $wholeQuery;
      }

      public function obtenerQueryNombrePunto($punto)
      {
        $baseQuery = sprintf(" SELECT * FROM `relaciones` WHERE `relaciones`.`c_costo_id` = '%s' ",$punto);
        return $baseQuery;
      }

      public function obtenerConteoResultados($filters, $conection)
      {
        $query = $this->obtenerQueryConteoResultados($filters);
        $result = $conection->getConection()->query($query);
        $to_return = 0;
        foreach ($result as $row)
        {
            $to_return = $row['total'];
        }

        return $to_return;
      }

      public function obtenerResultados($filters, $conection)
      {
        $query = $this->obtenerQueryResultados($filters);
        $result = $conection->getConection()->query($query);
        return $result;
      }

      public function obtenerSumaColumna($filters, $conection, $columna)
      {
        $query = $this->obtenerQuerySumaColumna($filters, $columna);
        $result = $conection->getConection()->query($query);
        $to_return = 0;
        foreach ($result as $row)
        {
            $to_return = $row['total'];
        }
        return $to_return;
      }

      public function obtenerDistinctColumna($filters, $conection, $columna)
      {
        $query = $this->obtenerQueryDistinctColumna($filters, $columna);
        $result = $conection->getConection()->query($query);
        $to_return = array();
        foreach ($result as $row)
        {
            $to_return[] = $row[$columna];
        }
        return $to_return;
      }

      public function obtenerNombrePunto($punto, $conection)
      {
        $query = $this->obtenerQueryNombrePunto($punto);
        $result = $conection->getConection()->query($query);
        $to_return = "";
        foreach ($result as $row)
        {
            $to_return = $row['pdv'];
        }
        return $to_return;
      }

      public function obtenerSumaValidaPromediadaDePreguntaGeneral10($params, $con, $pregunta)
      {
        $paramsSi =  $params;
        $paramsSi[$pregunta] = array('tablename' => 'dt_popsy_incognito', 'valor' => '1');
        $sumaSi = $this->obtenerSumaColumna($paramsSi,$con, $pregunta ) ;

        $cantidadSi =  $this->obtenerConteoResultados($paramsSi,$con);

        $paramsNo =  $params;
        $paramsNo[$pregunta] = array('tablename' => 'dt_popsy_incognito', 'valor' => '2');
        $sumaNo = $this->obtenerSumaColumna($paramsNo,$con, $pregunta );
        $cantidadNo =  $this->obtenerConteoResultados($paramsNo,$con);

        $paramsNA =  $params;
        $paramsNA[$pregunta] = array('tablename' => 'dt_popsy_incognito', 'valor' => '-1');
        $sumaNA = $this->obtenerSumaColumna($paramsNA,$con, $pregunta );
        $cantidadNA =  $this->obtenerConteoResultados($paramsNA,$con);

        $cantidadTotal = $cantidadSi + $cantidadNo + $cantidadNA;

        $promedioTotal = 0;
        if($cantidadTotal > 0)
        {
          $promedioTotal = $sumaSi / $cantidadTotal;
        }

        return $promedioTotal;
      }

      public function obtenerSumaValidaPromediadaDePreguntaGeneral10NA($params, $con, $pregunta)
      {
        $paramsSi =  $params;
        $paramsSi[$pregunta] = array('tablename' => 'dt_popsy_incognito', 'valor' => '1');
        $sumaSi = $this->obtenerSumaColumna($paramsSi,$con, $pregunta ) ;

        $cantidadSi =  $this->obtenerConteoResultados($paramsSi,$con);

        $paramsNo =  $params;
        $paramsNo[$pregunta] = array('tablename' => 'dt_popsy_incognito', 'valor' => '2');
        $sumaNo = $this->obtenerSumaColumna($paramsNo,$con, $pregunta );
        $cantidadNo =  $this->obtenerConteoResultados($paramsNo,$con);

        $paramsNA =  $params;
        $paramsNA[$pregunta] = array('tablename' => 'dt_popsy_incognito', 'valor' => '-1');
        $sumaNA = $this->obtenerSumaColumna($paramsNA,$con, $pregunta );
        $cantidadNA =  $this->obtenerConteoResultados($paramsNA,$con);

        $cantidadTotal = $cantidadSi + $cantidadNo + $cantidadNA;

        $promedioTotal = 0;
        if($cantidadTotal > 0)
        {
          $promedioTotal = $sumaNA / $cantidadTotal;
          $promedioTotal = abs($promedioTotal);
        }

        return $promedioTotal;
      }

      public function obtenerSumaValidaPromediadaDePreguntaGeneral01($params, $con, $pregunta)
      {
        $paramsSi =  $params;
        $paramsSi[$pregunta] = array('tablename' => 'dt_popsy_incognito', 'valor' => '1');
        $sumaSi = $this->obtenerSumaColumna($paramsSi,$con, $pregunta ) ;

        $cantidadSi =  $this->obtenerConteoResultados($paramsSi,$con);

        $paramsNo =  $params;
        $paramsNo[$pregunta] = array('tablename' => 'dt_popsy_incognito', 'valor' => '2');
        $sumaNo = $this->obtenerSumaColumna($paramsNo,$con, $pregunta );
        $sumaNo = $sumaNo/2;
        $cantidadNo =  $this->obtenerConteoResultados($paramsNo,$con);

        $paramsNA =  $params;
        $paramsNA[$pregunta] = array('tablename' => 'dt_popsy_incognito', 'valor' => '-1');
        $sumaNA = $this->obtenerSumaColumna($paramsNA,$con, $pregunta );
        $cantidadNA =  $this->obtenerConteoResultados($paramsNA,$con);

        $cantidadTotal = $cantidadSi + $cantidadNo + $cantidadNA;

        $promedioTotal = 0;
        if($cantidadTotal > 0)
        {
          $promedioTotal = $sumaNo / $cantidadTotal;
        }

        return $promedioTotal;
      }
  }