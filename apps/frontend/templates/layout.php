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
          <a class="brand" href="#">Pelota Paleta</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="<?php echo url_for('principal/index');?>">Inicio</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  Gestion de Personas <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo url_for('socio_abm/index');?>">Socio ABM</a></li>
                  <li><a href="<?php echo url_for('persona_abm/index');?>">Persona ABM</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  Buffet <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo url_for('ventas/index');?>">Ventas</a></li>
                  <li><a href="<?php echo url_for('producto_abm/index');?>">ABM Productos</a></li>
                  <li><a href="<?php echo url_for('stock_abm/index');?>">ABM Stock</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  Cuotas<b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="#">Operacion 1..</a></li>
                  <li><a href="#">Operacion 2..</a></li>
                  <li><a href="#">Operacion 3..</a></li>
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
        <p>&copy; Company 2012</p>
          <br><br>
      </footer>
    </div> <!-- /container -->
    <!-- include base js files from plugin -->
    <?php include_partial('default/mpProjectPlugin_js_assets', array('load' => array('jquery', 'twitter_bootstrap'))); ?>
    <?php include_javascripts() ?>
  </body>
</html>
