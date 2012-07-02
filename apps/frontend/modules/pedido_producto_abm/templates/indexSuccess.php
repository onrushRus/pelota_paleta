<?php /*@var $PedidoProducto PedidoProducto*/ ?>
<h1>Pedidos - Productos</h1>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Pedido</th>
      <th>Producto</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($PedidoProductos as $PedidoProducto): ?>
    <tr>
      <td><a href="<?php echo url_for('pedido_producto_abm/edit?pedido_id='.$PedidoProducto->getPedidoId().'&producto_id='.$PedidoProducto->getProductoId()) ?>"><?php echo $PedidoProducto->getPedidoId() ?></a></td>
      <td><a href="<?php echo url_for('pedido_producto_abm/edit?pedido_id='.$PedidoProducto->getPedidoId().'&producto_id='.$PedidoProducto->getProductoId()) ?>"><?php echo $PedidoProducto->getProducto()->getDescripcionProd() ?></a></td>
      <td>
          <a class="btn btn-warning btn-mini" href="<?php echo url_for('pedido_producto_abm/edit?id='.$PedidoProducto->getPedidoId()) ?>"><i class="icon-pencil icon-white"></i>Modificar</a>
          <?php echo link_to('<i class="icon-trash icon-white"></i>Eliminar', 'pedido_abm/delete?id='.$PedidoProducto->getPedidoId(), array('method' => 'delete', 'confirm' => 'Esta seguro de eliminar?', 'class'=>"btn btn-danger btn-mini")) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="btn btn-info" href="<?php echo url_for('pedido_abm/new') ?>">Nuevo Pedido-Producto</a>
