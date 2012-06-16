<h1>Productos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Descripcion prod</th>
      <th>Precio</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Productos as $Producto): ?>
    <tr>
      <td><a href="<?php echo url_for('producto_abm/edit?id='.$Producto->getId()) ?>"><?php echo $Producto->getId() ?></a></td>
      <td><?php echo $Producto->getDescripcionProd() ?></td>
      <td><?php echo $Producto->getPrecio() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('producto_abm/new') ?>">New</a>
