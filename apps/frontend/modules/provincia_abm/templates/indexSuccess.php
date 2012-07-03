<h1>Provincias</h1>

<table class="table table-bordered">
  <thead style="background: #7FDDCA">
    <tr>
      <th>Id</th>
      <th>Nombre prov</th>
      <th>Accions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Provincias as $Provincia): ?>
    <tr>
      <td><?php echo $Provincia->getId() ?></td>
      <td><?php echo $Provincia->getNombreProv() ?></td>
      <td>
          <a class="btn btn-warning btn-mini" href="<?php echo url_for('provincia_abm/edit?id='.$Provincia->getId()) ?>"><i class="icon-pencil icon-white"></i>Modificar</a>
          <?php echo link_to('<i class="icon-trash icon-white"></i>Eliminar', 'provincia_abm/delete?id='.$Provincia->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro de eliminar?', 'class'=>"btn btn-danger btn-mini")) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="btn btn-info" href="<?php echo url_for('provincia_abm/new') ?>">Nuevo</a>
</br>
</br>

<a class="btn" href="<?php echo url_for('provincia_abm/index') ?>">A personas</a>