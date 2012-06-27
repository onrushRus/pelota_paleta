<h1>Stocks</h1>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Id producto</th>
      <th>Cantidad actual</th>
      <th>Cantidad minima</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Stocks as $Stock): ?>
    <tr>
      <td><?php echo $Stock->getProductoId() ?></td>
      <td><?php echo $Stock->getCantidadActual() ?></td>
      <td><?php echo $Stock->getCantidadMinima() ?></td>
      <td><a class="btn btn-warning btn-mini" href="<?php echo url_for('stock_abm/edit?producto_id='.$Stock->getProductoId()) ?>"><i class="icon-pencil icon-white"></i>Modificar</a>
              <?php echo link_to('<i class="icon-trash icon-white"></i>Eliminar', 'stock_abm/delete?producto_id='.$Stock->getProductoId(), array('method' => 'delete', 'confirm' => '¿Estas seguro?', 'class'=>"btn btn-warning btn-mini")) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="btn" href="<?php echo url_for('stock_abm/new') ?>">Nuevo</a>
