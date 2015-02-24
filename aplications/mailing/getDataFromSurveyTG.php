<?php
/** Error reporting */
error_reporting(E_ALL);

// Conexi´on
$cona=mysqli_connect("localhost","synapsis_vsr","vsr123=","synapsis_popsy2_dev");



function insertPoll($poll,$con)
{
  $insert_query = sprintf("INSERT INTO `synapsis_popsy2_dev`.`dt_popsy_incognito` (`id`, `nombre_encuestador`, `cedula_encuestador`, `genero`, `edad`, `telefono`, `pais`, `region`, `zona`, `ciudad`, `pdv_id`, `pdvNombre`, `unidad_negocio`, `fecha`, `anio`, `mes`, `dia`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`,`p81_rasgos_fisicos`,`p82_personas`, `p9`, `p10`, `p11`, `p12`, `p12b`, `p13`, `p13b`, `p14`, `p15`, `p16`, `p17`,`p171_rasgos_fisicos`, `p18`, `p18b`, `p18c`, `18d`, `p19`, `p20`,`p201_mujeres`, `p21`, `p211_maquillaje`,`p22`,`p221_joyas`,`p222_hombres`, `p23`, `p231_afeitados`, `p24`, `p241_cabello`,`p25`,`p251_escarapela`, `p26`, `p261_uniforme`,`p27`, `p28`, `p29`, `p30`, `p31`, `p32`,`p321_lugar`, `p33`, `p331_sucio`,`p34`, `p35`, `p36`, `p37`, `p38`, `timestamp`, `notified12`, `srvid`,`pdv_map`) 
                            VALUES (NULL,
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s', 
                            '%s',
                            '%s',
                            '%s', 
                            '%s',
                            '%s',
                            '%s',
                            '%s', 
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s', 
                            '%s',
                            '%s', 
                            '%s', 
                            '%s',
                            '%s',
                            '%s', 
                            '%s',
                            '%s', 
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s', 
                            '%s', 
                            '%s',
                            '%s',
                            '%s',
                            '%s', 
                            '%s', 
                            '%s', 
                            '%s', 
                            '%s', 
                            '%s', 
                            '%s', 
                            '%s', 
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s', 
                            '%s',
                            '%s');",
                            $poll['NOMBRE_ENCUESTADOR'],
                            $poll['CEDULA_ENCUESTADOR'],
                            $poll['GENERO'],
                            $poll['EDAD'],
                            $poll['TELEFONO'],
                            $poll['PAIS'],
                            $poll['REGION'],
                            $poll['ZONA'],
                            $poll['CIUDAD'],
                            $poll['PDV_ID'],
                            $poll['PDV_NOMBRE'],
                            $poll['UNIDAD_NEGOCIO'],
                            $poll['FECHA'],
                            $poll['ANIO'],
                            $poll['MES'],
                            $poll['DIA'],
                            $poll['P1'],
                            $poll['P2'],
                            $poll['P3'],
                            $poll['P4'],
                            $poll['P5'],
                            $poll['P6'],
                            $poll['P7'],
                            $poll['P8'],
                            $poll['P81_RASGOS_FISICOS'],
                            $poll['P82_PERSONAS'],
                            $poll['P9'],
                            $poll['P10'],
                            $poll['P11'],
                            $poll['P12'],
                            $poll['P12B'],
                            $poll['P13'],
                            $poll['P13B'],
                            $poll['P14'],
                            $poll['P15'],
                            $poll['P16'],
                            $poll['P17'],
                            $poll['P171_RASGOS_FISICOS'],
                            $poll['P18'],
                            $poll['P18B'],
                            $poll['P18C'],
                            $poll['P18D'],
                            $poll['P19'],
                            $poll['P20'],
                            $poll['P201_MUJERES'],
                            $poll['P21'],
                            $poll['P211_MAQUILLAJE'],
                            $poll['P22'],
                            $poll['P221_JOYAS'],
                            $poll['P222_HOMBRES'],
                            $poll['P23'],
                            $poll['P231_AFEITADOS'],
                            $poll['P24'],
                            $poll['P241_CABELLO'],
                            $poll['P25'],
                            $poll['P251_ESCARAPELA'],
                            $poll['P26'],
                            $poll['P261_UNIFORME'],
                            $poll['P27'],
                            $poll['P28'],
                            $poll['P29'],
                            $poll['P30'],
                            $poll['P31'],
                            $poll['P32'],
                            $poll['P321_LUGAR'],
                            $poll['P33'],
                            $poll['P331_SUCIO'],
                            $poll['P34'],
                            $poll['P35'],
                            $poll['P36'],
                            $poll['P37'],
                            $poll['P38'],
                            $poll['CURRENT_TIMESTAMP'],
                            $poll['NOTIFIED12'],
                            $poll['SRVID'],
                            $poll['PDVMAP']
                            );

    if(mysqli_query($con,$insert_query))
    {
      echo "INSERTADA".PHP_EOL;
    }else
    {
      echo "ERROR INSERTANDO SRVID: ".$poll['SRVID'].PHP_EOL;
    }
}

  function getPDVInfo($pdv_id, $con)
  {
    $query_map = sprintf("SELECT * FROM `pdvs_map` WHERE  `sheet_index` = '%s' ",$pdv_id);
    $result_map = mysqli_query($con,$query_map );
    $result_f_map = mysqli_fetch_assoc($result_map);
    $query = sprintf("SELECT * FROM `relaciones` WHERE  `c_costo_nombre` LIKE '%s' ",$result_f_map['pdv_nombre']);
    $result = mysqli_query($con,$query);
    return mysqli_fetch_assoc($result);
  }
  
  function existPoll($srvid, $con)
  {
    $query = sprintf("SELECT * FROM `dt_popsy_incognito`  WHERE `dt_popsy_incognito`.`srvid` = '%s';",$srvid);
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result)>= 1)
    {
      return true;
    }
    return false;
  }

  function buildMappedPoll($datos, $con)
  {
//   PROCESS PDV INFO
    $pdv_info = getPDVInfo($datos[31], $con); 
    $pdv_pais = $pdv_info['pais'];
    $pdv_ciudad = $pdv_info['ciudad'];
    $pdv_regional= $pdv_info['regional'];
    $pdv_zona = $pdv_info['zona'];
    $pdv_nombre = $pdv_info['c_costo_nombre'];
    $pdv_id = $pdv_info['c_costo_id'];
    $pdv_unidad = $pdv_info['unidad_negocio'];
    
//  PRCESS DATE INFO
    $date = $datos[24];
    $date_parts = explode(" ", $date);
    $date_parts_day = explode("/",$date_parts[0]);
    $day = $date_parts_day[1];
    $month = $date_parts_day[0];
    $year = $date_parts_day[2];
    $timestamp = $year."-".$month."-".$day." ".$date_parts[1].":00";

    $map_array = array();
    $map_array['NOMBRE_ENCUESTADOR'] = $datos[26]; //OK
    $map_array['CEDULA_ENCUESTADOR'] = $datos[27]; //OK
    $map_array['GENERO'] = $datos[28]; //OK
    $map_array['EDAD'] = $datos[29]; //OK
    $map_array['TELEFONO'] = $datos[30]; //OK
    $map_array['PAIS'] = $pdv_pais; //OK
    $map_array['REGION'] = $pdv_regional;  //OK
    $map_array['ZONA'] = $pdv_zona; //OK
    $map_array['CIUDAD'] = $pdv_ciudad; //OK
    $map_array['PDV_ID'] = $pdv_id; //OK
    $map_array['PDV_NOMBRE'] = $pdv_nombre; //OK
    $map_array['UNIDAD_NEGOCIO'] = $pdv_unidad; //OK
    $map_array['FECHA'] = $date; //OK
    $map_array['ANIO'] = $year; //OK
    $map_array['MES'] = $month; //OK
    $map_array['DIA'] = $day; //OK
    $map_array['P1'] = $datos[34]; //OK
    $map_array['P2'] = $datos[35]; //OK
    $map_array['P3'] = $datos[36]; //OK
    $map_array['P4'] = $datos[37]; //OK
    $map_array['P5'] = $datos[38]; //OK
    $map_array['P6'] = $datos[39]; //OK
    $map_array['P7'] = $datos[40]; //OK
    $map_array['P8'] = $datos[41]; //OK
    $map_array['P81_RASGOS_FISICOS'] = $datos[42]; //OK
    $map_array['P82_PERSONAS'] = $datos[43]; //OK
    $map_array['P9'] = $datos[44];  //OK
    $map_array['P10'] = $datos[45]; //OK
    $map_array['P11'] = $datos[46]; //OK
    $map_array['P12'] = $datos[47]; //OK
    $map_array['P12B'] = $datos[48]; //OK
    $map_array['P13'] = $datos[49]; //OK
    $map_array['P13B'] = $datos[50]; //OK
    $map_array['P14'] = $datos[51]; //OK
    $map_array['P15'] = $datos[52]; //OK
    $map_array['P16'] = $datos[53]; //OK
    $map_array['P17'] = $datos[54]; //OK
    $map_array['P171_RASGOS_FISICOS'] = $datos[55]; //OK
    $map_array['P18'] = $datos[56]; //OK
    $map_array['P18B'] = 0; /*$datos[57];*/
    $map_array['P18C'] = $datos[57]; //OK
    $map_array['P18D'] = $datos[58]; //OK
    $map_array['P19'] = $datos[59]; //OK
    $map_array['P20'] = $datos[60]; //OK
    $map_array['P201_MUJERES'] = $datos[61]; //OK 
    $map_array['P21'] = $datos[62];  //OK
    $map_array['P211_MAQUILLAJE'] = $datos[63]; //OK
    $map_array['P22'] = $datos[64];  //OK
    $map_array['P221_JOYAS'] = $datos[65]; //OK
    $map_array['P222_HOMBRES'] = $datos[66]; //OK
    $map_array['P23'] = $datos[67]; //OK
    $map_array['P231_AFEITADOS'] = $datos[68]; //OK
    $map_array['P24'] = $datos[69];   //OK
    $map_array['P241_CABELLO'] = $datos[70]; //OK
    $map_array['P25'] = $datos[71]; //OK
    $map_array['P251_ESCARAPELA'] = $datos[72]; //OK
    $map_array['P26'] = $datos[73];   //OK
    $map_array['P261_UNIFORME'] = $datos[74]; //OK
    $map_array['P27'] = $datos[75]; //OK
    $map_array['P28'] = $datos[76]; //OK
    $map_array['P29'] = $datos[77]; //OK //OK
    $map_array['P30'] = $datos[78]; //OK
    $map_array['P31'] = $datos[79]; //OK
    $map_array['P32'] = $datos[80]; //OK
    $map_array['P321_LUGAR'] = $datos[81]; //OK
    $map_array['P33'] = $datos[82];  //OK
    $map_array['P331_SUCIO'] = $datos[83]; //OK
    $map_array['P34'] = $datos[84]; //OK
    $map_array['P35'] = $datos[85]; //OK
    $map_array['P36'] = $datos[86]; //OK
    $map_array['P37'] = $datos[87]; //OK
    $map_array['P38'] = $datos[88]; //OK
    $map_array['CURRENT_TIMESTAMP'] = $timestamp; //OK
    $map_array['NOTIFIED12'] = "0"; //OK
    $map_array['SRVID'] = $datos[0]; //OK
    $map_array['PDVMAP'] = $datos[31];
    
    return $map_array;
 }

 
 //   CONEXION

//   FILE DOWNLOAD
  $date = date("y_m_d_H_i_s");
  $new_filename = sprintf("new_eval_%s.csv",$date);
  $cmd_to_execute = sprintf("wget http://synapsis-rs.org/popsy/mistery.csv -O %s", $new_filename);
  exec($cmd_to_execute);
  
  
//   DUMP FILE IN  DATABASE
  $fila = 1;
  if (($gestor = fopen($new_filename, "r")) !== FALSE) {
      $msj = "NO_ENTRY".PHP_EOL;
      while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
        if($fila > 1)
        {
          $poll = buildMappedPoll($datos,$cona);
          if(!existPoll($poll['SRVID'], $cona))
          {
            insertPoll($poll,$cona);
            $msj = $msj."[OK] ENCUESTA CON SRVID: ".$poll['SRVID']." HA SIDO INSERTADA EN EL SISTEMA".PHP_EOL;
          }else
          {
            $msj = $msj."[ERROR] ENCUESTA CON SRVID: ".$poll['SRVID']." YA EXISTE EN EL SISTEMA".PHP_EOL;
          }
        }
        $fila++;
      }
      exec(sprintf("echo '%s' > info_%s.log",$msj,$date));
      echo $msj;
      fclose($gestor);
  }
  


?>