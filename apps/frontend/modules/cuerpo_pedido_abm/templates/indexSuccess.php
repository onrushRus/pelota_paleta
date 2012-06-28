<h1>CuerpoPedidos List</h1>

<table>
  <thead>
    <tr>
      <th>Encabezado pedido</th>
      <th>Producto</th>
      <th>Cantidad</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($CuerpoPedidos as $CuerpoPedido): ?>
    <tr>
      <td><a href="<?php echo url_for('cuerpo_pedido_abm/edit?encabezado_pedido_id='.$CuerpoPedido->getEncabezadoPedidoId().'&producto_id='.$CuerpoPedido->getProductoId()) ?>"><?php echo $CuerpoPedido->getEncabezadoPedidoId() ?></a></td>
      <td><a href="<?php echo url_for('cuerpo_pedido_abm/edit?encabezado_pedido_id='.$CuerpoPedido->getEncabezadoPedidoId().'&producto_id='.$CuerpoPedido->getProductoId()) ?>"><?php echo $CuerpoPedido->getProductoId() ?></a></td>
      <td><?php echo $CuerpoPedido->getCantidad() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('cuerpo_pedido_abm/new') ?>">New</a>
