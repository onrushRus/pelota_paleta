<h1>Proveedors List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre proveedor</th>
      <th>Dom calle</th>
      <th>Dom nro</th>
      <th>Dom piso</th>
      <th>Dom dpto</th>
      <th>Telefono</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Proveedors as $Proveedor): ?>
    <tr>
      <td><a href="<?php echo url_for('proveedor_abm/edit?id='.$Proveedor->getId()) ?>"><?php echo $Proveedor->getId() ?></a></td>
      <td><?php echo $Proveedor->getNombreProveedor() ?></td>
      <td><?php echo $Proveedor->getDomCalle() ?></td>
      <td><?php echo $Proveedor->getDomNro() ?></td>
      <td><?php echo $Proveedor->getDomPiso() ?></td>
      <td><?php echo $Proveedor->getDomDpto() ?></td>
      <td><?php echo $Proveedor->getTelefono() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('proveedor_abm/new') ?>">New</a>
