<?php /* @var $Producto Producto*/?>
<h1>Productos</h1>

<table class="table table-bordered">
    <thead style="background: #7FDDCA">
    <tr>
      <th>Id</th>
      <th>Descripcion producto</th>
      <th>Marca</th>
      <th>Presentación</th>
      <th>Precio</th>
      <th>Stock</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Productos as $Producto): ?>
    <tr>
      <td><?php echo $Producto->getId() ?></td>
      <td><?php echo $Producto->getDescripcionProd() ?></td>
      <td><?php echo $Producto->getMarca() ?></td>
      <td><?php echo $Producto->getPresentacion() ?></td>
      <td><?php echo "$".$Producto->getPrecio() ?></td>
      <td>
          <?php if ( ($Producto->getStockCritico($Producto->getId())) == "poco stock"): ?>
          <i class="icon-warning-sign"></i><h4 style="color: red; display: inline">  POCO STOCK</h4> 
          <?php else: ?>
                      <h4 style="color: green">STOCK Normal</h4>
          <?php endif?>
      </td>
      <td>
          <a class="btn btn-mini btn-warning" href="<?php echo url_for('producto_abm/edit?id='.$Producto->getId()) ?> "><i class="icon-pencil icon-white"></i>Modificar</a>
          <?php echo link_to('<i class="icon-trash icon-white"></i>Eliminar', 'producto_abm/delete?id='.$Producto->getId(), array('method' => 'delete', 'confirm' => 'Estas seguro de eliminar?', 'class' => "btn btn-mini btn-danger")) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="btn btn-info" href="<?php echo url_for('producto_abm/new') ?>">Nuevo Producto</a>
