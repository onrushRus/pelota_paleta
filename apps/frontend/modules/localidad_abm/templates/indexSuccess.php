<h1>Localidads List</h1>

<table>
  <thead style="background: #7FDDCA">
    <tr>
      <th>Id</th>
      <th>Nombre loc</th>
      <th>Cod postal</th>
      <th>Provincia</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Localidads as $Localidad): ?>
    <tr>
      <td><a href="<?php echo url_for('localidad_abm/edit?id='.$Localidad->getId()) ?>"><?php echo $Localidad->getId() ?></a></td>
      <td><?php echo $Localidad->getNombreLoc() ?></td>
      <td><?php echo $Localidad->getCodPostal() ?></td>
      <td><?php echo $Localidad->getProvinciaId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('localidad_abm/new') ?>">New</a>
