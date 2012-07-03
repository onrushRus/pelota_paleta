<h1>Localidades</h1>

<table class="table table-bordered">
  <thead style="background: #7FDDCA">
    <tr>
      <th>Id</th>
      <th>Nombre loc</th>
      <th>Cod postal</th>
      <th>Provincia</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Localidads as $Localidad): ?>
    <tr>
      <td><?php echo $Localidad->getId() ?></td>
      <td><?php echo $Localidad->getNombreLoc() ?></td>
      <td><?php echo $Localidad->getCodPostal() ?></td>
      <td><?php echo $Localidad->getProvinciaId() ?></td>
      <td>
          <a class="btn btn-warning btn-mini" href="<?php echo url_for('localidad_abm/edit?id='.$Localidad->getId()) ?>"><i class="icon-pencil icon-white"></i>Modificar</a>
          <?php echo link_to('<i class="icon-trash icon-white"></i>Eliminar', 'localidad_abm/delete?id='.$Localidad->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro de eliminar?', 'class'=>"btn btn-danger btn-mini")) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="btn" href="<?php echo url_for('localidad_abm/new') ?>">Nuevo</a>
  </br>
  </br>
  &nbsp;<a class="btn" href="<?php echo url_for('provincia_abm/index') ?>">A Provincias</a>
&nbsp;<a class="btn" href="<?php echo url_for('persona_abm/index') ?>">A Personas</a>