<?php /* @var $Producto Producto*/?>
<h1>Productos</h1>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Id</th>
      <th>Descripcion producto</th>
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
          <a class="btn btn-mini btn-warning" href="<?php echo url_for('producto_abm/edit?id='.$Producto->getId()) ?> "><i class="icon-pencil icon-white"></i>Modificar</a>
          <?php echo link_to('<i class="icon-trash icon-white"></i>Eliminar', 'producto_abm/delete?id='.$Producto->getId(), array('method' => 'delete', 'confirm' => '¿Estas seguro?', 'class' => "btn btn-mini btn-danger")) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="btn btn-info" href="<?php echo url_for('producto_abm/new') ?>">Nuevo Producto</a>
