<?php

function convert($ans)
{
  if($ans == 1)
  {
    return "SI";
  }
  if($ans == 2)
  {
    return "NO";
  }
  if($ans == -1)
  {
    return "N/A";
  }

if($ans == 0)
  {
    return "NO";
  }
  
  return $ans;
}

function sendEmail($actual_period_results,$mails)
{

                        $table_rows = '';
                        $para = implode(",",$mails['users']);
                        $con = 1;
                        //var_dump($actual_period_results);
                        foreach($actual_period_results['centros'] as $centro)
                        { 
                                                        $table_rows .= '<tr>';
                                                        $table_rows .= sprintf('<td> %s </td>',$centro['pais']);
                                                        $table_rows .= sprintf('<td> %s </td>',$centro['ciudad']);
                                                        $table_rows .= sprintf('<td> %s </td>',$centro['pdvNombre']);
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p1']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p2']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p3']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p4']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p5']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p6']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p7']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p8']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p81_rasgos_fisicos']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p9']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p10']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p11']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p12']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p13']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p14']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p15']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p16']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p17']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p171_rasgos_fisicos']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p18']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p19']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p20']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p21']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p22']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p23']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p24']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p25']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p26']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p27']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p28']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p29']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p30']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p31']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p32']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p33']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p34']));
                                                        $table_rows .= sprintf('<td> %s </td>',convert($centro['p35']));
                                                         $table_rows .= sprintf('<td> %s </td>',($centro['timestamp']));
                                                        $table_rows .= '</tr>';                 
                        }
                        
                        if(sizeof($actual_period_results['centros']) == 0 )
                        {
                          $table_rows .= "";
                        }
                        $titulo = 'Evaluación Cliente Incógnito- Nuevas Encuestas En El Sistema ';
                        $css = 'table {
                                width: 650px;
                                border-collapse:collapse;
                                border:1px solid #FFCA5E;
                        }
                        caption {
                                font: 1.8em/1.8em Arial, Helvetica, sans-serif;
                                text-align: left;
                                text-indent: 10px;
                                background: url(bg_caption.jpg) right top;
                                height: 45px;
                                color: #FFAA00;
                        }
                        thead th {
                                background: url(bg_th.jpg) no-repeat right;
                                height: 47px;
                                color: #FFFFFF;
                                font-size: 0.8em;
                                font-weight: bold;
                                padding: 0px 7px;
                                margin: 20px 0px 0px;
                                text-align: left;
                                border-right: 1px solid #FCF1D4;
                        }
                        tbody tr {
                        background: url(bg_td1.jpg) repeat-x top;
                        }
                        tbody tr.odd {
                                background: #FFF8E8 url(bg_td2.jpg) repeat-x;
                        }

                        tbody th,td {
                                font-size: 0.8em;
                                line-height: 1.4em;
                                font-family: Arial, Helvetica, sans-serif;
                                color: #777777;
                                padding: 10px 7px;
                                border-top: 1px solid #FFCA5E;
                                border-right: 1px solid #DDDDDD;
                                text-align: left;
                        }
                        a {
                                color: #777777;
                                font-weight: bold;
                                text-decoration: underline;
                        }
                        a:hover {
                                color: #F8A704;
                                text-decoration: underline;
                        }
                        tfoot th {
                                background: url(bg_total.jpg) repeat-x bottom;
                                color: #FFFFFF;
                                height: 30px;
                        }
                        tfoot td {
                                background: url(bg_total.jpg) repeat-x bottom;
                                color: #FFFFFF;
                                height: 30px;
                        }';

                        // message
                        $mensaje = sprintf('
                        <html>
                        <head>
                                <title></title>

                                <style>
                                        %s   
                                </style>
                        </head>
                        <body>
                                <p>En la tabla se encuentran las  últimas evaluaciones (Cliente Incógnito)<p>
                        <br/>
                        <br/>  
                        <table>
                                        <tr>
                                                <th>País</th>
                                                <th>Ciudad</th>
                                                <th>Punto de venta </th>
                                                <th>P1</th>
                                                <th>P2</th>
                                                <th>P3</th>
                                                <th>P4</th>
                                                <th>P5</th>
                                                <th>P6</th>
                                                <th>P7</th>
                                                <th>P8</th>
                                                <th>P8.1</th>
                                                <th>P9</th>
                                                <th>P10</th>
                                                <th>P11</th>
                                                <th>P12</th>
                                                <th>P13</th>
                                                <th>P14</th>
                                                <th>P15</th>
                                                <th>P16</th>
                                                <th>P17</th>
                                                <th>P17.1</th>
                                                <th>P18</th>
                                                <th>P19</th>
                                                <th>P20</th>
                                                <th>P21</th>
                                                <th>P22</th>
                                                <th>P23</th>
                                                <th>P24</th>
                                                <th>P25</th>
                                                <th>P26</th>
                                                <th>P27</th>
                                                <th>P28</th>
                                                <th>P29</th>
                                                <th>P30</th>
                                                <th>P31</th>
                                                <th>P32</th>
                                                <th>P33</th>
                                                <th>P34</th>
                                                <th>P35</th>
                                                <th> Hora </th>
                                        </tr>
                                        %s
                                </table>
                                <br/>
                                <br/>
                                <table>
                                        <tr>
                                                <th> Label </th>
                                                <th> Pregunta </th>
                                        </tr>
                                        <tr>
                                          <td> P1 </td>
                                          <td> ¿ EN EL SALUDO LE DIJO BIENVENIDO A POPSY/GELARTI? </td>
                                        </tr>
                                        <tr>
                                          <td> P2 </td>
                                          <td> ¿SONRIÓ Y FUE AMABLE?  </td>
                                        </tr>
                                        <tr>
                                          <td> P3 </td>
                                          <td> ¿LE OFRECIERON DEGUSTAR ALGÚN SABOR EXCLUSIVO?  </td>
                                        </tr>
                                        <tr>
                                          <td> P4 </td>
                                          <td> ¿LE DIJERON QUE EL SABOR EXCLUSIVO LO PUEDE DISFRUTAR EN CUALQUIER PRESENTACIÓN POR SOLO COLOMBIA: $1.000 ADICIONALES - PERU S/. 1.50?  </td>
                                        </tr>
                                        <tr>
                                          <td> P5 </td>
                                          <td> ¿LE SUGIRIÓ OTROS PRODUCTOS? </td>
                                        </tr>
                                        <tr>
                                          <td> P6 </td>
                                          <td> ¿QUÉ LE SUGIRIERON? </td>
                                        </tr>
                                        <tr>
                                          <td> P7 </td>
                                          <td> ¿LE CONFIRMARON EL PEDIDO (PRODUCTOS SOLICITADO - TOTAL DE LA FACTURA - DINERO RECIBIDO Y CAMBIO)?</td>
                                        </tr>
                                        <tr>
                                          <td> P8 </td>
                                          <td>  NOMBRE DE QUIEN LE TOMA EL PEDIDO (-1 En caso de no tener pin/gafete) </td>
                                        </tr>
                                        <tr>
                                          <td> P8.1 </td>
                                          <td>  RASGOS FíSICOS DE QUIEN LE TOMA EL PEDIDO</td>
                                        </tr>
                                        <tr>
                                          <td> P9 </td>
                                          <td> ¿SE LAVA LAS MANOS (Cuando prepara el cajero )?   </td>
                                        </tr>
                                        <tr>
                                          <td> P10 </td>
                                          <td> ¿UTILIZA PINZAS (Para coger el cono y para toppings)?   </td>
                                        </tr>
                                        <tr>
                                          <td> P11 </td>
                                          <td> ¿UTILIZA CONERA/BANDEJA?  </td>
                                        </tr>
                                        <tr>
                                          <td> P12 </td>
                                          <td> ¿LOS PRODUCTOS / SABORES SOLICITADOS ESTAN DISPONIBLES?  </td>
                                        </tr>
                                        <tr>
                                          <td> P13 </td>
                                          <td> ¿EL PRODUCTO RECIBIDO CORRESPONDE AL PEDIDO?  </td>
                                        </tr>
                                        <tr>
                                          <td> P14 </td>
                                          <td> ¿LA PRESENTACION DEL PRODUCTO ES (Debe ser igual a la foto)? PERÚ:: Los productos que llevan galleta redonda se esta preparando con barquillo </td>
                                        </tr>
                                        <tr>
                                          <td> P15 </td>
                                          <td> ¿SE DESPIDIÓ? </td>
                                        </tr>
                                        <tr>
                                          <td> P16 </td>
                                          <td> ¿SONRIÓ Y FUE AMABLE? </td>
                                        </tr>
                                        <tr>
                                          <td> P17 </td>
                                          <td> NOMBRE DE QUIEN PREPARA Y ENTREGA EL PRODUCTO (-1 En caso de no tener pin/gafete) </td>
                                        </tr>
                                        <tr>
                                          <td> P17.1 </td>
                                          <td> RASGOS FíSICOS DE QUIEN PREPARA Y ENTREGA EL PRODUCTO (-1 En caso de no tener pin/gafete) </td>
                                        </tr>
                                        <tr>
                                          <td> P18 </td>
                                          <td> Fila cantidad de personas delante de usted  </td>
                                        </tr>
                                        <tr>
                                          <td> P19 </td>
                                          <td> Observaciones (recuerde no omitir opiniones)  </td>
                                        </tr>
                                        <tr>
                                          <td> P20 </td>
                                          <td> ¿REGISTRA Y ENTREGA EL TIQUETE DE COMPRA ( FACTURA GENERADA POR EL SISTEMA O FACTURA LITOGRÁFICA ) ? REVISAR FECHA Y HORA  </td>
                                        </tr>
                                        <tr>
                                          <td> P21 </td>
                                          <td> ¿TODOS TIENEN MAQUILLAJE SUAVE (No se debe usar pestañina) ?  </td>
                                        </tr>
                                        <tr>
                                          <td> P22 </td>
                                          <td> ¿ ALGUNO TIENE JOYAS (No se debe usar aretes, pulseras, reloj, anillos)?  </td>
                                        </tr>
                                        <tr>
                                          <td> P23 </td>
                                          <td> ¿TODOS ESTAN AFEITADOS? </td>
                                        </tr>
                                        <tr>
                                          <td> P24 </td>
                                          <td> ¿TODOS TIENEN EL CABELLO RECOGIDO?  </td>
                                        </tr>
                                        <tr>
                                          <td> P25 </td>
                                          <td> ¿TODOS TIENEN ESCARAPELA/PIN?  </td>
                                        </tr>
                                        <tr>
                                          <td> P26 </td>
                                          <td> ¿TODOS TIENEN EL UNIFORME COMPLETO? </td>
                                        </tr>
                                        <tr>
                                          <td> P27 </td>
                                          <td> ¿ESTÁ EXHIBIDA LA CALCOMANIA DE PRODUCTO GRATIS? </td>
                                        </tr>
                                        <tr>
                                          <td> P28 </td>
                                          <td> ¿LAS MESAS, SILLAS Y SOFÁS ESTAN LIMPIOS?  </td>
                                        </tr>
                                        <tr>
                                          <td> P29 </td>
                                          <td> ¿LOS PISOS ESTAN LIMPIOS?  </td>
                                        </tr>
                                        <tr>
                                          <td> P30 </td>
                                          <td> ¿EL CONGELADOR PANORAMICO ESTA LIMPIO?  </td>
                                        </tr>
                                        <tr>
                                          <td> P31 </td>
                                          <td> ¿LA EXHIBICION DE SABORES COINCIDEN CON NOMBRE DEL PRODUCTO?  </td>
                                        </tr>
                                        <tr>
                                          <td> P32 </td>
                                          <td> ¿ESTÁ EL HABLADOR DE SUGERENCIAS UBICADO EN LA CARTELRA AL LADO OPUESTO DE LA CAJA? COLOMBIA:SUGERENCIAS@HELADOSPOPSY.COM PERÚ:SUGERENCIAS@GELARTI.COM  </td>
                                        </tr>
                                        <tr>
                                          <td> P33 </td>
                                          <td> ¿LA EXHIBICION DE TOPPINGS Y POPSYTOY ESTA BIEN SURTIDA Y LIMPIA? DEBE TENER MINIMO 3 POPSY/GELARTI TOYS ASI SEAN REFERENCIAS REPETIDAS.  </td>
                                        </tr>
                                        <tr>
                                          <td> P34 </td>
                                          <td> N° DE PRODUCTOS COMPRADOS:  </td>
                                        </tr>
                                        <tr>
                                          <td> P35 </td>
                                          <td> DESCRIPCIÓN DE PRODUCTOS COMPRADOS </td>
                                        </tr>
                                </table>
                                <br/>
                                <br/>
                                Para consultar la evaluación completa de los puntos ingrese a este <a href="http://popsy.synapsis-rs.org/visor.php">Link</a>
                        </body>
                        </html>
                        ',$css,$table_rows);

                        // Para enviar un correo HTML mail, la cabecera Content-type debe fijarse
                        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                        $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

                        // Cabeceras adicionales
                        $cabeceras .= 'From: Notification <notification@synapsis-rs.com>' . "\r\n";

                        //echo $mensaje ; 
                        // Mail it
                        mail($para, $titulo, $mensaje, $cabeceras);
}
?>