<h1>Pedidos</h1>

<table class="table table-bordered">

  <thead>
    <tr>
      <th>Id</th>
      <th>Proveedor</th>
      <th>Fecha pedido</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Pedidos as $Pedido): ?>
    <tr>
      <td><?php echo $Pedido->getId() ?></td>
      <td><?php echo $Pedido->getProveedorId() ?></td>
      <td><?php echo $Pedido->getFechaPedido() ?></td>
      <td>
          <a class="btn btn-warning btn-mini" href="<?php echo url_for('pedido_abm/edit?id='.$Pedido->getId()) ?>"><i class="icon-pencil icon-white"></i>Modificar</a>
          <?php echo link_to('<i class="icon-trash icon-white"></i>Eliminar', 'pedido_abm/delete?id='.$Pedido->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro de eliminar?', 'class'=>"btn btn-danger btn-mini")) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="btn btn-info" href="<?php echo url_for('pedido_abm/new') ?>">Nuevo Pedido</a>
