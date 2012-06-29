<h1>Proveedores</h1>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre proveedor</th>
      <th>Dom calle</th>
      <th>Dom nro</th>
      <th>Dom piso</th>
      <th>Dom dpto</th>
      <th>Telefono</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Proveedors as $Proveedor): ?>
    <tr>
      <td><?php echo $Proveedor->getId() ?></td>
      <td><?php echo $Proveedor->getNombreProveedor() ?></td>
      <td><?php echo $Proveedor->getDomCalle() ?></td>
      <td><?php echo $Proveedor->getDomNro() ?></td>
      <td><?php echo $Proveedor->getDomPiso() ?></td>
      <td><?php echo $Proveedor->getDomDpto() ?></td>
      <td><?php echo $Proveedor->getTelefono() ?></td>
      <td>
          <a class="btn btn-warning btn-mini" href="<?php echo url_for('proveedor_abm/edit?id='.$Proveedor->getId()) ?>"><i class="icon-pencil icon-white"></i>Modificar</a>
      <?php echo link_to('<i class="icon-trash icon-white"></i>Eliminar', 'proveedor_abm/delete?id='.$Proveedor->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro de Eliminar?', 'class'=>"btn btn-warning btn-mini")) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="btn btn-info" href="<?php echo url_for('proveedor_abm/new') ?>">Nuevo</a>
