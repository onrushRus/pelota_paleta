<h1>Stocks</h1>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Id producto</th>
      <th>Cantidad actual</th>
      <th>Cantidad minima</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Stocks as $Stock): ?>
    <tr>
      <td><?php echo $Stock->getProductoId() ?></td>
      <td><?php echo $Stock->getCantidadActual() ?></td>
      <td><?php echo $Stock->getCantidadMinima() ?></td>
      <td><a href="<?php echo url_for('stock_abm/edit?producto_id='.$Stock->getProductoId()) ?>">Modificar</a></td>
      <td><a href="<?php echo url_for('stock_abm/edit?producto_id='.$Stock->getProductoId()) ?>">Eliminar</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="btn" href="<?php echo url_for('stock_abm/new') ?>">Nuevo</a>
