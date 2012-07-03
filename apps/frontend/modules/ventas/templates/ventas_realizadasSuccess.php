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
        <table class="table-condensed" width="14%">
            <?php
            $aux = 0;$aux2 = 0;
            foreach ($lista_prod as $id => $item):
                if (isset($item['cant'])):
                    $prod = ProductoQuery::create()->findPk($id); 
                    $aux = $item['cant'] * $prod->getPrecio(); 
                    $aux2 = $aux + $aux2;  ?>
                    <tr>
                        <td><?php echo $prod->getId() . "  " . $prod->getDescripcionProd()?></td>
                        <td rawspan="2"><?php echo "$ ".$aux ?></td>
                    </tr>            
                    <tr><td><? echo $prod->getPrecio() . " X " . $item['cant'];?></td></tr>
                <?php endif;?> 
            <?php endforeach; ?>
                    <tr><td></td><td>--------------</td></tr>
                    <tr><td>Total</td><td><?php echo "$ ".$aux2?></td></tr>
        </table>
        <tr><td rowspan="3"> </td></tr>
        <tr><td><input class="btn btn-success" type="button" value="Imprimir"/></td></tr>
    </form>
</div>