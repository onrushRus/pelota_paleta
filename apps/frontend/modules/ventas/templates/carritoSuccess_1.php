<?php /* @var $prod Producto */ ?>
<h1 class="alert-info">Venta realizada con exito</h1>
<h2 class="alert-success">TICKET</h2>
<hr></hr>

<div class="container">
    <h4>Pelota Paleta S.A</h4>
    <h4>CUIT Nro.: 30-6854896584-4</h4>
    <h4>A CONSUMIDOR FINAL</li>
    <h4>Fecha <?php date_default_timezone_set('UTC'); echo date("d-m-y") . "Hora " . date("H:i:s -03:00"); ?></h4>  
    <form>
        <table class="table-condensed" width="30%">
            <?php
            $aux = 0;$aux2 = 0;
            $lista_prod = $sf_user->getListado();
            foreach ($lista_prod as $id => $item):
                if ($item['cant'] > 0):
                    $prod = ProductoQuery::create()->findPk($id); 
                    $aux = $item['cant'] * $prod->getPrecio(); 
                    $aux2 = $aux + $aux2;  ?>
                    <tr>
                        <td><?php echo $prod->getId() . " - " . $prod->getDescripcionProd()?></td>
                        <td rawspan="2"><?php echo "$ ".$aux ?></td>
                    </tr>            
                    <tr><td><? echo $prod->getPrecio() . " X " . $item['cant'];?></td></tr>
                <?php endif;?> 
            <?php endforeach; ?>
                    <tr><td></td><td>-------</td></tr>
                    <tr><td>Total</td><td><?php echo "$ ".$aux2?></td></tr>
        </table>
        <tr><td rowspan="3"> </td></tr>
        <tr><td><a class="btn btn-success" href="<?php echo url_for('ventas/index') ?>">Imprimir Ticket</a> </td></tr>        
    </form>
</div>


<table width="40%">
    <tr>
        <td><a class="btn btn-info" href="<?php echo url_for('ventas/index') ?>">Agregar más producto al carrito</a></td>
        <td><a class="btn btn-success" href="<?php echo url_for('ventas/ventas_realizadas') ?>">Terminar Venta</a></td>
    </tr>
</table>