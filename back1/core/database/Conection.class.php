<?php

class Conection
{
//  private $PDOInstance;
//  private $host = "localhost";
//  private $user = "root";
//  private $password = "sky123";
//  private $database = "popsy_dev";
  
   private $PDOInstance;
   private $host = "localhost";
   private $user = "synapsis_vsr";
   private $password = "vsr123=";
   private $database = "synapsis_popsy2_dev";
   
  

  public function __construct()
  {
    try
    {
      $this->PDOInstance= new PDO(sprintf("mysql:host=%s;dbname=%s",$this->host ,$this->database), $this->user, $this->password);
    }
    catch(PDOException $e)
    {
      echo $e->getMessage();
    }
  }
  
  public function getConection() {
    return $this->PDOInstance;
  }
  
  public function closeConection()
  {
    $this->PDOInstance = null;
  }
  
}