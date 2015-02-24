<?php
  require_once('ComponentsLoader.class.php');
  $loader = new ComponentsLoader();
  $loader->loadAll();

  $requestPostParams = $_POST;
  if(!isset($_POST['destino']))
  {
    $requestPostParams = $_GET;
  }
  $responser = new ResponseDispatcher();
  $responser->respond($requestPostParams);

