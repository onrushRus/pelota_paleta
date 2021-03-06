<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>

    <!-- more metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">

    <!-- include base css files from plugin -->
    <?php include_partial('default/mpProjectPlugin_css_assets', array('load' => array('twitter_bootstrap'))); ?>

    <?php include_stylesheets() ?>
  </head>
  <body>
  <!--[if lt IE 8]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
    <!-- sample navbar -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo url_for('principal/index');?>">Pelota Paleta</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  Gestion Personas <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo url_for('socio_abm/index');?>">Socio ABM</a></li>
                  <li><a href="<?php echo url_for('persona_abm/index');?>">Persona ABM</a></li>
                  <li><a href="<?php echo url_for('proveedor_abm/index');?>">Proveedores ABM</a></li>                
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  Gestión Buffet <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo url_for('ventas/index');?>">Ventas</a></li>
                  <li><a href="<?php echo url_for('producto_abm/index');?>">Productos ABM</a></li>
                  <li><a href="<?php echo url_for('pedido_abm/index');?>">Pedido ABM</a></li>
                  <li><a href="<?php echo url_for('pedido_producto_abm/index');?>">Pedido - Producto</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  Gestión Torneos <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo url_for('club_abm/index');?>">Clubs ABM</a></li>
                  <li><a href="<?php echo url_for('inscripto_abm/index');?>">Inscripción ABM</a></li>
                  <li><a href="<?php echo url_for('torneo_abm/index');?>">Torneo ABM</a></li>
                  <li><a href="<?php echo url_for('puntos_puesto_abm/index');?>">Puestos ABM</a></li>
                  <li><a href="<?php echo url_for('resultado_torneo_abm/index');?>">Resultados Torneo</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  Gestión Reserva<b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo url_for('reserva_abm/index');?>">Reservas ABM</a></li>
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container-fluid"> 
        <?php echo $sf_content ?>
      <hr>
      <footer>
        <p>&copy; UDC 2012 </p>
          <br><br>
      </footer>
    </div> <!-- /container -->
    <!-- include base js files from plugin -->
    <?php include_partial('default/mpProjectPlugin_js_assets', array('load' => array('jquery', 'twitter_bootstrap'))); ?>
    <?php include_javascripts() ?>
  </body>
</html>
