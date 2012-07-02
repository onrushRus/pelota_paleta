<?php /*@var $PedidoProducto PedidoProducto*/ ?>
<h1>Pedidos - Productos</h1>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Pedido</th>
      <th>Producto</th>
      <th>Precio</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($PedidoProductos as $PedidoProducto): ?>
    <tr>
      <td><a href="<?php echo url_for('pedido_producto_abm/edit?pedido_id='.$PedidoProducto->getPedidoId().'&producto_id='.$PedidoProducto->getProductoId()) ?>"><?php echo $PedidoProducto->getPedidoId() ?></a></td>
      <td><a href="<?php echo url_for('pedido_producto_abm/edit?pedido_id='.$PedidoProducto->getPedidoId().'&producto_id='.$PedidoProducto->getProductoId()) ?>"><?php echo $PedidoProducto->getProducto()->getDescripcionProd() ?></a></td>
      <td><?php echo "$".$PedidoProducto->getProducto()->getPrecio()?></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>