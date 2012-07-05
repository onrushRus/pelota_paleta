<?php /* @var $prod Producto */ ?>
<h1 class="alert-info">Carrito de Compras</h1>
<hr></hr>

<div class="container">

    <form>
        <table class="table-condensed" width="30%">
            <?php
            $aux = 0;$aux2 = 0;
            $lista_prod = $sf_user->getListado();
            foreach ($lista_prod as $id => $item):
                    $prod = ProductoQuery::create()->findPk($id); 
                    $aux = $item['cant'] * $prod->getPrecio(); 
                    $aux2 = $aux + $aux2;  ?>
                    <tr>
                        <td><?php echo $prod->getId() . " - " . $prod->getDescripcionProd()?></td>
                        <td rawspan="2"><?php echo "$ ".$aux ?></td>
                    </tr>            
                    <tr><td><? echo $prod->getPrecio() . " X " . $item['cant'];?></td></tr>
            <?php endforeach; ?>
                    <tr><td></td><td>-------</td></tr>
                    <tr><td>Total</td><td><?php echo "$ ".$aux2?></td></tr>
        </table>       
    </form>
</div>


<table width="40%">
    <tr>
        <td><a class="btn btn-info" href="<?php echo url_for('ventas/index') ?>">Agregar más producto al carrito</a></td>
        <td><a class="btn btn-success" href="<?php echo url_for('ventas/ventas_realizadas') ?>">Terminar Venta</a></td>
    </tr>
</table>