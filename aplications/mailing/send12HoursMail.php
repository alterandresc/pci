<?php 

header('Content-type: text/plain; charset=utf-8');

require_once "database/Conection.class.php";
require_once "compose_mail.php";

$conection = new Conection();
$query = "SELECT `dt_popsy_incognito`.`id`, 
          `dt_popsy_incognito`.`nombre_encuestador`,
          `dt_popsy_incognito`.`cedula_encuestador`, 
          `dt_popsy_incognito`.`genero`, 
         `dt_popsy_incognito`.`edad`, 
         `dt_popsy_incognito`.`telefono`,
         `dt_popsy_incognito`.`pais`,
          `dt_popsy_incognito`.`region`,
          `dt_popsy_incognito`.`zona`, 
          `dt_popsy_incognito`.`ciudad`,
          `dt_popsy_incognito`.`pdv_id`,
          `dt_popsy_incognito`.`pdvNombre`,
          `dt_popsy_incognito`.`unidad_negocio`,
          `fecha`,
          `anio`,
          `mes`, 
          `dia`,
          `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`,
          `p11`, `p12`, `p12b`, `p13`, `p13b`, `p14`, `p15`, `p16`, `p17`,
          `p18`, `p18b`, `p18c`, `18d`, `p19`, `p20`, `p21`, `p22`, `p23`, 
          `p24`, `p25`, `p26`, `p27`, `p28`, `p29`, `p30`, `p31`, `p32`, `p33`,
          `p34`, `p35`, `p36`, `p37`, `p38`, `timestamp`, `notified12`, `srvid`,
          `relaciones`.`id` AS `rid`,
          `relaciones`.`c_costo_nombre` AS `rc_costo_nombre`, 
          `relaciones`.`c_costo_nombre_legible` AS `rc_costo_nombre`, 
          `relaciones`.`pais` AS `rpais` , 
          `relaciones`.`ciudad` AS `rciudad` ,
          `relaciones`.`regional` AS `rregional`,
          `relaciones`.`zona` AS `rzona`,
          `relaciones`.`direccion` AS `rdireccion`,
          `relaciones`.`c_costo_id` AS `rc_costo_id`, 
          `relaciones`.`unidad_negocio` AS `runidad_negocio`,
          `relaciones`.`latitud` AS `rlatitud`,
          `relaciones`.`longitud` AS `rlongitud`,
          `relaciones`.`distribucion` AS `rdistribucion`
          
          FROM dt_popsy_incognito LEFT JOIN `relaciones` ON `dt_popsy_incognito`.`pdv_id` = `relaciones`.`c_costo_id` WHERE notified12 = 0  GROUP BY `dt_popsy_incognito`.`id` ORDER BY `dt_popsy_incognito`.`id` asc";

         // echo $query;
$results = $conection->getConection()->query($query);

function getReceiveAllMails($conection)
{
        $periods_query = "SELECT `id`,`type`,`value`, `email` FROM `users_to_notify` WHERE `type` = 'all';";
        $periods_data = $conection->getConection()->query($periods_query);
        $mails = array();
        foreach ($periods_data as $mail_row)
        {
          $mails['users'][] = $mail_row['email'];
        }
        return $mails;
}


function getReceivePerCustom($type, $value, $conection)
{
        $periods_query = sprintf("SELECT * FROM `users_to_notify` WHERE `type` = '%s' and `value`= '%s';",$type,$value);
        //echo $periods_query;
        $periods_data = $conection->getConection()->query($periods_query);;
        $mails = array();
        foreach ($periods_data as $mail_row)
        {
                $mails['users'][] = $mail_row['email'];
        }
        
        return $mails;
}

function markAsSent($id, $conection)
{
  $query = ("UPDATE `dt_popsy_incognito` SET `notified12` = '1' WHERE `dt_popsy_incognito`.`id` = ?;");
  $q = $conection->getConection()->prepare($query);
  $q->execute(array($id));
  echo $id.PHP_EOL;
}

$to_mail_polls = array();


foreach ($results as $row)
{
   $to_mail_polls['centros'][] = $row;
}

if(!empty($to_mail_polls))
{
    $receive_all = getReceiveAllMails($conection);
    //var_dump($receive_all);
    //enviar notification a los usuarios que deben recibir todos los correos
    sendEmail($to_mail_polls, $receive_all);

    //enviar notificaciones a los responsables por pais
    $countries = array();
    foreach($to_mail_polls['centros'] as $mail_poll)
    {
            $countries[$mail_poll['rpais']]['centros'][] = $mail_poll;
    }

    foreach($countries as $name => $country)
    {
      echo "pais ".$name."<br>";
      //var_dump(getReceivePerCustom('pais',$name,$conection));
      sendEmail($country, getReceivePerCustom('pais',$name,$conection));
    }
    
    
    //enviar notificaciones por ciudad
      $cities = array();

    foreach($to_mail_polls['centros'] as $centro)
    {
            $cities[$centro['rciudad']]['centros'][] = $centro;
    }

    foreach($cities as $name => $city)
    {
      echo "ciudad ".$name."<br>";
     // var_dump(getReceivePerCustom('ciudad',$name,$conection));
      sendEmail($city, getReceivePerCustom('ciudad',$name,$conection));
    }

    //enviar notificaciones por regional
      $regions = array();

    foreach($to_mail_polls['centros'] as $centro)
    {
            $regions[$centro['rregional']]['centros'][] = $centro;
    }

    foreach($regions as $name => $city)
    {
      echo "regional ".$name."<br>";
     // var_dump(getReceivePerCustom('regional',$name,$conection));
      sendEmail($city, getReceivePerCustom('regional',$name,$conection));
    }

    //enviar notificaciones por zona

    $zones = array();

    foreach($to_mail_polls['centros'] as $centro)
    {
            $zones[$centro['rzona']]['centros'][] = $centro;
    }

    foreach($zones as $name => $zone)
    {
      echo "zona ".$name."<br>";
     // var_dump(getReceivePerCustom('zona',$name,$conection));
      sendEmail($zone, getReceivePerCustom('zona',$name,$conection));
    }

    //enviar notificaciones  a los responsables de cada pdv
    //ne funcion´e plus
    $receive_per_pdv =array();

//     foreach($to_mail_polls['centros'] as $centro)
//     {
//       echo "pdv ".$centro['pventa']."<br>";
//       var_dump(getReceivePerCustom('pdv',$centro['pventa'],$conection));
//             $receive_per_pdv[$centro['pdvNombre']]['info'] = $centro;
//             $tmp['centros'] = array($centro);
//             sendEmail($tmp, getReceivePerCustom('pdv',$centro['pventa'],$conection));
//     }
  
  //mar as sent
  foreach($to_mail_polls['centros'] as $mail_poll)
  {
        markAsSent($mail_poll['id'],$conection);
  }
}








?>