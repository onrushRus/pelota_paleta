<?php /* @var $prod Producto */ ?>
<h1 class="alert-info">Venta de productos</h1>

<fieldset><legend>Buscar Producto</legend>
    <fieldset>
        <form name="busqueda" method="POST" action="<?php echo url_for('ventas/index'); ?>">
            <ul class="unstyled">
                <li><label>Por código: </label><input type="text" value="" name="codigo_producto"></li>
                <li><label>Por nombre: </label><input type="text" value="" name="nombre_producto"></li>
                <li><label>Por marca: </label><input type="text" value="" name="marca_producto"></li>
                <li><input class="btn-inverse" type="submit" value="Buscar"></li>
            </ul>
        </form>
    </fieldset>
    
    <fieldset><legend>Productos</legend>
        <form name="busqueda" method="POST" action="<?php echo url_for('ventas/ventas_realizadas'); ?>">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Código</th>
                  <th>Dni</th>
                  <th>Apellido y Nombre</th>
                  <th>Agregar al carrito</th> 
                </tr>
              </thead>
              <tbody>
                <?php foreach ($Productos as $prod): ?>
                <tr>
                    <td><?php echo $prod->getId() ?></td>
                    <td><?php echo $prod->getDescripcionProd() ?></td>
                    <td><?php echo $prod->getPrecio() ?></td>  
                    <td>
                        <input type="checkbox" value="<?php echo $prod->getId()?>" name="ventas_prod[]"/>
                    </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <input class="btn-inverse" type="submit" value="Vender"></input>
        </form>
    </fieldset>
</fieldset>
<a href="<?php echo url_for('principal/index');?>">Home</a>