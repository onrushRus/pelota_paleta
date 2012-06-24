<?php /* @var $prod Producto */ ?>
<h1 class="alert-info">Venta realizada con exito</h1>

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
    <?php foreach ($lista_prod as $prod): ?>
        <tr>
            <td><?php echo $prod ?></td>
            <td><?//php echo $prod->getDescripcionProd() ?></td>
            <td><?//php echo $prod->getPrecio() ?></td>  
            <td>
                <input type="checkbox" value="<?php echo $prod->getId() ?>" name="ventas_prod[]"/>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
