<h1>Provincias List</h1>

<table>
  <thead style="background: #7FDDCA">
    <tr>
      <th>Id</th>
      <th>Nombre prov</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Provincias as $Provincia): ?>
    <tr>
      <td><a href="<?php echo url_for('provincia_abm/edit?id='.$Provincia->getId()) ?>"><?php echo $Provincia->getId() ?></a></td>
      <td><?php echo $Provincia->getNombreProv() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('provincia_abm/new') ?>">New</a>
