<?php /* @var $prod Producto */ ?>
<h1 class="alert-info">Venta de productos</h1>

<fieldset><legend>Buscar Producto</legend>
    <fieldset>
        <form name="busqueda" method="POST" action="<?php echo url_for('ventas/index'); ?>">
            <ul class="unstyled">
                <li><label>Por código: </label><input type="text" value="" name="cod_prod"></li>
                <li><label>Por descripción: </label><input type="text" value="" name="descrip_prod"></li>
                <li><label>Por marca: </label><input type="text" value="" name="marca_prod"></li>
                <li><input class="btn-inverse" type="submit" value="Buscar"></li>
            </ul>
        </form>
    </fieldset>

<?php if ( ((int)$sf_request->getParameter('cod_prod') || $sf_request->getParameter('descrip_prod') || $sf_request->getParameter('marca_prod') ) && count($Productos) > 0): ?>
    <fieldset><legend>Productos</legend>
        <form name="busqueda" method="POST" action="<?php echo url_for('ventas/ventas_realizadas'); ?>">
            <table class="table table-bordered">
              <thead style="background: #7FDDCA">
                <tr>
                  <th>Código</th>
                  <th>Descripción</th>
                  <th>Marca</th>
                  <th>Presentación</th>
                  <th>Precio</th>
                  <th>Cantidad a llevar</th>
                  <th>Cantidad Actual</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($Productos as $prod): ?>
                <tr>
                    <td><?php echo $prod->getId() ?></td>
                    <td><?php echo $prod->getDescripcionProd() ?></td>
                    <td><?php echo $prod->getMarca()?></td>
                    <td><?php echo $prod->getPresentacion() ?></td>
                    <td><?php echo $prod->getPrecio() ?></td>  
                    <td>
                        <input type="text" class="span1" name="prod[<?php echo $prod->getId()?>][cant]"/>
                    </td>
                    <td><?php echo $prod->getStock()->getCantidadActual() ?></td> 
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <input class="btn-inverse" type="submit" value="Vender">
        </form>
    </fieldset>
   </fieldset>
<a href="<?php echo url_for('principal/index');?>">Home</a>
<?php else:?>
<div class="alert alert-info">No hay registros</div>
<?php endif ?>