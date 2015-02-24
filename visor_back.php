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

    <div class="container">
      <div class="starter-template">
      
                                <div class="container">
                          
                                <div class="row">
                                        <div class="col-md-3">
                                                Pais
                                                <div class="input-group">
                                                        <div class="input-group-btn">
                                                                <select id="select-pais" class="form-control priority-value">
                                                                        <option value="todo">Todas</option>
                                                                </select>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-lg-3">
                                                Regional
                                                <div class="input-group">
                                                        <div class="input-group-btn">
                                                                <select id="select-region" class="form-control priority-value">
                                                                        <option value="todo">Todas</option>
                                                                </select>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-lg-3">
                                                Zona
                                                <div class="input-group">
                                                        <div class="input-group-btn">
                                                                <select id="select-zona" class="form-control priority-value">
                                                                        <option value="todo">Todas</option>
                                                                </select>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-lg-3">
                                                Ciudad
                                                <div class="input-group">
                                                        <div class="input-group-btn">
                                                                <select id="select-ciudad" class="form-control priority-value">
                                                                        <option value="todo">Todas</option>
                                                                </select>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-lg-3">
                                                PDV
                                                <div class="input-group">
                                                        <div class="input-group-btn">
                                                                <select id="select-PDV" class="form-control priority-value">
                                                                        <option value="todo">Todos</option>
                                                                </select>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-lg-3" style="margin-top:-1.5em;">
                                                Unidad de negocio
                                                <div class="input-group">
                                                        <div class="input-group-btn">
                                                                <select id="select-negocio" class="form-control priority-value">
                                                                        <option value="todo">Todas</option>
                                                                        <option value="todo">COMERCIAL ALLAN S.A.S</option>
                                                                        <option value="todo">Expertos En Café</option>
                                                                        <option value="todo">Franquicias Unidas Del Perú</option>
                                                                </select>
                                                        </div>
                                                </div>
                                        </div>
                                
                                        <div class="col-lg-6">
                                                Periodo
                                                <div>   
                                                        <input type="checkbox" name="chk_group[]"  value="2014-1" class="periods" />2014-07 (Julio)<br />
                                                        <input type="checkbox" name="chk_group[]"  value="2014-2" class="periods" />2014-08 (Agosto)<br />
                                                </div>
                                  </div><!-- /.col-lg-3 -->
                                
                                </div>
                        </div><!-- cierre controles -->
      
      
        <div class="row">
        </div>
        
        <!-- Total Encuestas-->
          <!-- Total Encuestas-->
          
          
          <div class="container dashboard-content">
          
          
                        <!-- Grafica 1-->
                        <div class="row">
                                <h3>Indices</h3>
                                <h4>Base - Tiendas</h4>
                                <div class="col-md-12">
                                        <div id="chart_div_10"></div>
                                </div>
                                <div class="col-md-12" style="padding-top:4em">
                                  <div id="chart_div_20"></div>
                                        <div >
                                                <span id="ultimo_mes" style="padding-left: 3em;">
                                                
                                                </span>
                                                <span id="acumulado_reloj_1" style="padding-left: 7em;">
                                                
                                                </span>
                                                
                                        </div>
                                </div>
                        </div>
                        <hr />
                        
                        <!-- Grafica 2-->
                        <div class="row">
                                <h3>Indices Por Capítulo</h3>
                                <h4></h4>
                                <div class="col-md-18">
                                        <div id="chart_div_30"></div>
                                </div>
                        </div>
                        <hr />
                        
                        
                        <!-- Tiempos-->
                        <div class="row">
                                <h3>Tiempos</h3>
                                <h4></h4>
                                <div class="col-md-18">
                                       <table class="table table-striped">
                                          <thead>
                                            <tr>
                                              <td>
                                                Indicador
                                              </td>
                                              <td>
                                                Promedio
                                              </td>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>
                                                #Personas
                                              </td>
                                              <td>
                                                30
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                              Tiempo de fila
                                              </td>
                                              <td>
                                                3 minutos 
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                Tiempo de entrega
                                              </td>
                                              <td>
                                                7 minutos
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                # Productos
                                              </td>
                                              <td>
                                                4
                                              </td>
                                            </tr>
                                          </tbody>
                                      </table>
                                </div>
                        </div>
                        <hr />
                        
                        <!-- VENTA Y FACTURACIÓN-->
                        <div class="row">
                                <h3>VENTA Y FACTURACIÓN</h3>
                                <div class="col-md-12">
                                        <div id="chart_div_40"></div>
                                </div>
                                <div class="col-md-12" >
                                  <div id="chart_div_50"></div>
                                        
                                </div>
                        </div>
                        <hr />
                        
                      <!--Operación-->
                        <div class="row">
                                <h3>OPERACIÓN</h3>
                                <div class="col-md-12">
                                        <div id="chart_div_60"></div>
                                </div>
                                <div class="col-md-12" >
                                  <div id="chart_div_70"></div>
                                        
                                </div>
                        </div>
                        <hr />
                        
                                                
                      <!--IMAGEN PERSONAL-->
                        <div class="row">
                                <h3>IMAGEN PERSONAL</h3>
                                <div class="col-md-12">
                                        <div id="chart_div_80"></div>
                                </div>
                                <div class="col-md-12">
                                  <div id="chart_div_90"></div>
                                        
                                </div>
                        </div>
                        <hr />
                        
                        <!--AMBIENTE Y OTROS-->
                        <div class="row">
                                <h3>AMBIENTE Y OTROS</h3>
                                <div class="col-md-12">
                                        <div id="chart_div_100"></div>
                                </div>
                                <div class="col-md-12" >
                                  <div id="chart_div_110"></div>
                                        
                                </div>
                        </div>
                        <hr />
                        
                        
          </div> <!-- /.container dashboard-content -->
        
        
        
      </div>
    </div><!-- /.container -->

    
    
    <!-- /.importar jquery -->
    
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    
    <!-- /.importar javascript de bootstrap -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- /.importar javascript base donde se inicializa todo-->
    
    <!-- importar los scripts de las gráficas aqui -->
     
    <script type="text/javascript" src="scripts/js_charts/chart_10.js"></script>
    <script type="text/javascript" src="scripts/js_charts/chart_20.js"></script>
    <script type="text/javascript" src="scripts/js_charts/chart_30.js"></script>
    <script type="text/javascript" src="scripts/js_charts/chart_40.js"></script>
    <script type="text/javascript" src="scripts/js_charts/chart_50.js"></script>
    <script type="text/javascript" src="scripts/js_charts/chart_60.js"></script>
    <script type="text/javascript" src="scripts/js_charts/chart_70.js"></script>
    <script type="text/javascript" src="scripts/js_charts/chart_80.js"></script>
    <script type="text/javascript" src="scripts/js_charts/chart_90.js"></script>
    <script type="text/javascript" src="scripts/js_charts/chart_100.js"></script>
    <script type="text/javascript" src="scripts/js_charts/chart_110.js"></script>

    
    <!-- Google Script -->
    <script type="text/javascript" src="scripts/util.js"></script>
    
    <script type="text/javascript" src="scripts/calls.js"></script>
    
    <!-- Google Script -->
    <script type="text/javascript" src="scripts/load_google.js"></script>
    
    <script type="text/javascript" src="scripts/base.js"></script>
  </body>
</html>
 