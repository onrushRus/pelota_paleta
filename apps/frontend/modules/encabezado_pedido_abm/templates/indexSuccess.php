<h1>EncabezadoPedidos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Proveedor</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($EncabezadoPedidos as $EncabezadoPedido): ?>
    <tr>
      <td><a href="<?php echo url_for('encabezado_pedido_abm/edit?id='.$EncabezadoPedido->getId()) ?>"><?php echo $EncabezadoPedido->getId() ?></a></td>
      <td><?php echo $EncabezadoPedido->getProveedorId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('encabezado_pedido_abm/new') ?>">New</a>
