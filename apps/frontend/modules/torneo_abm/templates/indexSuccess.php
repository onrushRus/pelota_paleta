<h1>Torneos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Anio</th>
      <th>Nombre</th>
      <th>Tipo torneo</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Torneos as $Torneo): ?>
    <tr>
      <td><a href="<?php echo url_for('torneo_abm/edit?id='.$Torneo->getId()) ?>"><?php echo $Torneo->getId() ?></a></td>
      <td><?php echo $Torneo->getAnio() ?></td>
      <td><?php echo $Torneo->getNombre() ?></td>
      <td><?php echo $Torneo->getTipoTorneo() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('torneo_abm/new') ?>">New</a>
