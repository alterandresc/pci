<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="vendor/css/starter-template.css" rel="stylesheet">
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map_canvas { height: 100% }
    </style>
    <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB6wzeNjiXbHStSt8zDFDkh0SlmdUyLqQQ&sensor=false">
    </script>

  </head>
  <body >
  
      <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header" >
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
             <li><a href="visor.php"><img border=0 src="vendor/img/home.png"></a></li>
            <li style="color:#FFFFFF"><a style="color:#FFFFFF" href="geotrack.php" style="color:#FFFF">GeoTracker</a></li>
            <li style="color:#FFFFFF"><a href="https://docs.google.com/spreadsheets/d/1Ny5WKypBGe_hTLAjxBG4CKPwPwQQ31GCt43-2O0nRhI/edit?usp=sharing" target="blank" style="color:#FFFFFF">Reportes</a></li>
            <li style="color:#FFFFFF"><a href="https://docs.google.com/spreadsheets/d/1bUUly3GRlazp0jD3cytdnfsvAt7wYWScSJyOGU7zl7Y/edit?usp=sharing" target="blank" style="color:#FFFFFF">Evaluaciones</a></li>
<!--             <li style="color:#FFFFFF"><a style="color:#FFFFFF" href="security/logout.php" style="color:#FFFF">Salir</a></li> -->
<!--             <li style="color:#FFFFFF"><a style="color:#FFFFFF" href="security/logout.php" style="color:#FFFF">Salir</a></li> -->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    
    <br><br><br><br>
    
    <!-- CONTROLES-->
     <div class="container">
        <!-- FILTROS-->
      </div>

    
    
          <div class="container ">
                        
                        <!-- Total Encuestas-->
                        <div class="row">
                              <div class="col-md-8" id="contenedor_de_total_respuestas"></div>
                      </div>

          </div>
          <br><br>
          
          
    <div id="map_canvas" style="width:auto; height:100%"></div>
    
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    
    <!-- /.importar javascript de bootstrap -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- /.importar javascript base donde se inicializa todo-->

    
    <script type="text/javascript" src="scripts/geotrack/load_google_geo.js"></script>
    
    <script type="text/javascript" src="scripts/geotrack/calls_geotrack.js"></script>
    
    <script type="text/javascript" src="scripts/geotrack/base.js"></script>
  </body>
</html>