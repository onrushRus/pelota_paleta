<h1>Pedidos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Proveedor</th>
      <th>Fecha pedido</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Pedidos as $Pedido): ?>
    <tr>
      <td><a href="<?php echo url_for('pedido_abm/edit?id='.$Pedido->getId()) ?>"><?php echo $Pedido->getId() ?></a></td>
      <td><?php echo $Pedido->getProveedorId() ?></td>
      <td><?php echo $Pedido->getFechaPedido() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('pedido_abm/new') ?>">New</a>
