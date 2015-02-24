<?php

  class Helper
  {
    
    public function buildFiltersForQuery($params)
    {
      $filters= array();
      
      $filters['periods'] = array('tablename' => 'dt_popsy_incognito', 'valor' => $params['periods']);
      $filters['pais'] = array('tablename' => 'relaciones', 'valor' => $params['pais']);
      $filters['regional'] = array('tablename' => 'relaciones', 'valor' => $params['regional']);
      $filters['ciudad'] = array('tablename' => 'relaciones','valor' => $params['ciudad']);
      $filters['zona'] = array('tablename' => 'relaciones', 'valor' => $params['zona']);
      $filters['c_costo_id'] = array('tablename' => 'relaciones', 'valor' => $params['c_costo_id']);
      $filters['unidad_negocio'] = array('tablename' => 'relaciones', 'valor' => $params['unidad_negocio']);
      
      return $filters;
    }
    
    public function getFilterConf($name, $value)
    {
        switch ($name)
        {
            case 'regional':
                    return array('tablename' => 'relaciones', 'valor' => $value);
                    break;
            case 'ciudad':
                    return array('tablename' => 'relaciones', 'valor' => $value);
                    break;
            case 'tipo':
                    return array('tablename' => 'relaciones', 'valor' => $value);
            case 'tipo_restaurante':
                    return array('tablename' => 'relaciones', 'valor' => $value);
                    break;
            case 'codigo':
                    return array('tablename' => 'relaciones', 'valor' => $value);
                    break;
            case 'periods':
                    return array('tablename' => 'fb_encuesta', 'valor' => $value);
                    break;
        }
    }
    
    public function redondeado($numero, $decimales)
    {
            $factor = pow(10, $decimales);
            return (round($numero*$factor)/$factor);
    } 
    
    public function obtenerPesoVenta()
    {
      return 50;
    }
    
    public function obtenerPesoOperacion()
    {
      return  50/3;
    }
    
    public function obtenerPesoAmbiente()
    {
      return 50/3;
    }
    
    public function obtenerPesoImagen()
    {
      return 50/3;
    }
    
    public function obtenerPesoUnitarioOperacion()
    {
      return 1/8;
    }
    
    public function aplicarRegla3($valor1, $valor2, $aConvertir)
    {
      $convertido = ($aConvertir * $valor2)/$valor1;
      return $this->redondeado($convertido, 2);
    }
  }