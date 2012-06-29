<h1>PedidoProductos List</h1>

<table>
  <thead>
    <tr>
      <th>Pedido</th>
      <th>Producto</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($PedidoProductos as $PedidoProducto): ?>
    <tr>
      <td><a href="<?php echo url_for('pedido_producto_abm/edit?pedido_id='.$PedidoProducto->getPedidoId().'&producto_id='.$PedidoProducto->getProductoId()) ?>"><?php echo $PedidoProducto->getPedidoId() ?></a></td>
      <td><a href="<?php echo url_for('pedido_producto_abm/edit?pedido_id='.$PedidoProducto->getPedidoId().'&producto_id='.$PedidoProducto->getProductoId()) ?>"><?php echo $PedidoProducto->getProductoId() ?></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('pedido_producto_abm/new') ?>">New</a>
