<?php /* @var $Producto Producto*/?>
<h1>Productos List</h1>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Id</th>
      <th>Descripcion prod</th>
      <th>Precio</th>
      <th>Editar Producto</th>
      <th>Stock</th>
      <th>Cargar Stock</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Productos as $Producto): ?>
    <tr>
      <td><?php echo $Producto->getId() ?></td>
      <td><?php echo $Producto->getDescripcionProd() ?></td>
      <td><?php echo $Producto->getPrecio() ?></td>
      <td><a href="<?php echo url_for('producto_abm/edit?id='.$Producto->getId()) ?>">Editar</a></td>
      <td><?php echo ($Producto->getStockCritico($Producto->getId())); ?></td>
      <td><a href="<?php echo url_for('stock_abm/edit?producto_id='.$Producto->getId());?>">Cargar Stock</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('producto_abm/new') ?>">New</a>
