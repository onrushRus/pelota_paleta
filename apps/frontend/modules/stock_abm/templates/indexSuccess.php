<h1>Stocks List</h1>

<table>
  <thead>
    <tr>
      <th>Producto</th>
      <th>Cantidad actual</th>
      <th>Cantidad minima</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Stocks as $Stock): ?>
    <tr>
      <td><a href="<?php echo url_for('stock_abm/edit?producto_id='.$Stock->getProductoId()) ?>"><?php echo $Stock->getProductoId() ?></a></td>
      <td><?php echo $Stock->getCantidadActual() ?></td>
      <td><?php echo $Stock->getCantidadMinima() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('stock_abm/new') ?>">New</a>
