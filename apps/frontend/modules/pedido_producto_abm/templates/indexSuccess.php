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
      <td><?php echo $PedidoProducto->getPedidoId() ?></td>
      <td><?php echo $PedidoProducto->getProducto()->getDescripcionProd() ?></td>
      <td><?php echo "$".$PedidoProducto->getProducto()->getPrecio()?></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>