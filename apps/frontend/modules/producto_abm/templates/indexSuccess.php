<?php /* @var $Producto Producto*/?>
<h1>Productos</h1>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Id</th>
      <th>Descripcion prod</th>
      <th>Precio</th>
      <th>Stock</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Productos as $Producto): ?>
    <tr>
      <td><?php echo $Producto->getId() ?></td>
      <td><?php echo $Producto->getDescripcionProd() ?></td>
      <td><?php echo $Producto->getPrecio() ?></td>
      <td><?php echo ($Producto->getStockCritico($Producto->getId())); ?></td>
      <td>
          <a class="btn btn-mini btn-warning" href="<?php echo url_for('producto_abm/edit?id='.$Producto->getId()) ?> ?>"><i class="icon-pencil icon-white"></i></a>
          <a class="btn btn-mini btn-danger" href="<?php echo url_for('producto_abm/edit?id='.$Producto->getId())?>"><i class="icon-trash icon-trash"></i></a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="btn btn-info" href="<?php echo url_for('producto_abm/new') ?>">Nuevo</a>
