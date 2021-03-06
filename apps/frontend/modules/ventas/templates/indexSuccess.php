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

<?php if ( ((int)$sf_request->getParameter('cod_prod') || $sf_request->getParameter('descrip_prod') || $sf_request->getParameter('marca_prod') ) &&  (count($Productos) > 0) ): ?>
    <fieldset><legend>Productos</legend>
        <form name="busqueda" method="POST" action="<?php echo url_for('ventas/carrito'); ?>">
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
            
            
            <?php /*
                echo $Productos->getNbResults()." elementos encontrados. Mostrando resultados desde ".$Productos->getFirstIndice()." hasta ".$Productos->getLastIndice()."<br>";
                if ($Productos->haveToPaginate()){
                    echo link_to('&laquo;', 'ventas/index?pag='.$Productos->getFirstPage());
                    echo link_to('&lt;', 'ventas/index?pag='.$Productos->getPreviousPage());
                    $links = $Productos->getLinks();
                    foreach ($links as $page):
                        echo ($page == $Productos->getPage()) ? $page : link_to($page, 'ventas/index?pag='.$page);
                        if ($page != $Productos->getCurrentMaxLink()): ?>
                            /
                        <?php endif;?> 
                    <?php endforeach; 
                    echo link_to('&gt;','ventas/index?pag='.$Productos->getNextPage());
                    echo link_to('&raquo;','ventas/index?pag='.$Productos->getLastPage());
               } */
           ?>
            
            
            
            <input class="btn-inverse" type="submit" value="Agregar a Carrito">
        </form>
    </fieldset>
   </fieldset>
<?php else:?>
<div class="alert alert-info">No hay registros</div>
<?php endif ?>