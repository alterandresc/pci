<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Popsy</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="vendor/css/starter-template.css" rel="stylesheet">
    
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header" style="color:#FFFFFF">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" style="color:#FFFF"><img width="175" height="40" src="vendor/img/logo.png"></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
<!--             <li class="active"><a href="#" style="color:#FFFF">Dashboard</a></li> -->
<!--             <li style="color:#FFFFFF"><a style="color:#FFFFFF" href="mapa/" style="color:#FFFF">GeoTracker</a></li> -->
<!--             <li style="color:#FFFFFF"><a style="color:#FFFFFF" href="security/logout.php" style="color:#FFFF">Salir</a></li> -->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>


      <div class="starter-template">
      
      

        <!-- Total Encuestas-->
          <!-- Total Encuestas-->
          
          <div class="jumbotron">
      <div class="container">
        <h1>Bienvenido!</h1>
        <p>Seleccione el visor al que desea acceder. <br> Gracias! </p>
        
        <p><a role="button" class="btn btn-primary btn-lg" href="http://synapsis-rs.com/app/tk14003/">Evaluación Servicio >></a></p>
          <p><a role="button" class="btn btn-primary btn-lg" href="visor.php">Cliente Incógnito &nbsp;&nbsp;&nbsp; >></a></p>
      </div>
    </div>
        
        
      </div>

    <div class="container">
      <!-- Example row of columns -->
                        <!-- Graficas-->
                        <div class="row">
                                <h3>General</h3>
                                <h4></h4>
                                <div class="col-md-12">
                                        <div id="chart_div_l10"></div>
                                </div>
                                <div class="col-md-12">
                                        <div id="chart_div_l20"></div>
                                </div>
                        </div>
                        <hr />
      
      </div>

    
    
    <!-- /.importar jquery -->
    
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    
    <!-- /.importar javascript de bootstrap -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- /.importar javascript base donde se inicializa todo-->
    <script type="text/javascript" src="scripts/base.js"></script>
    
    <!-- importar los scripts de las gráficas aqui -->
     
    <script type="text/javascript" src="scripts/js_charts/chart_l10.js"></script>
    <script type="text/javascript" src="scripts/js_charts/chart_l20.js"></script>
    
    <!-- Google Script -->
    <script type="text/javascript" src="scripts/calls_choose.js"></script>
    
    <!-- Google Script -->
    <script type="text/javascript" src="scripts/load_google.js"></script>
    
  </body>
</html>
 