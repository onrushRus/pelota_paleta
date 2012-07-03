<h1>Pedidos</h1>

<table class="table table-bordered">

  <thead style="background: #7FDDCA">
    <tr>
      <th>Identificador</th>
      <th>Proveedor</th>
      <th>Fecha pedido</th>
      <th>Pedido activo</th>
      <th>Descripción pedido</th>
      
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Pedidos as $Pedido): ?>
    <tr>
      <td><?php echo $Pedido->getId() ?></td>
      <td><?php echo $Pedido->getProveedor()->getNombreProveedor() ?></td>
      <td><?php echo $Pedido->getFechaPedido('d-m-Y (H:m:s)') ?></td>
      <td><?php echo $Pedido->getEstado() ?></td>
      <td>
          <a class="btn btn-success btn-mini" href="<?php echo url_for('pedido_producto_abm/index?id='.$Pedido->getId()) ?>"><i class="icon-pencil icon-white"></i>Descripción</a>
      </td>
      <td>
          <a class="btn btn-warning btn-mini" href="<?php echo url_for('pedido_abm/edit?id='.$Pedido->getId()) ?>"><i class="icon-pencil icon-white"></i>Modificar</a>
          <?php echo link_to('<i class="icon-trash icon-white"></i>Eliminar', 'pedido_abm/delete?id='.$Pedido->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro de eliminar?', 'class'=>"btn btn-danger btn-mini")) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="btn btn-info" href="<?php echo url_for('pedido_abm/new') ?>">Nuevo Pedido</a>
