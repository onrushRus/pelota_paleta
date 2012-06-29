<h1>ResultadoTorneos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Puesto</th>
      <th>Torneo cat</th>
      <th>Pelotari nro doc</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($ResultadoTorneos as $ResultadoTorneo): ?>
    <tr>
      <td><a href="<?php echo url_for('resultado_torneo_abm/edit?id='.$ResultadoTorneo->getId()) ?>"><?php echo $ResultadoTorneo->getId() ?></a></td>
      <td><?php echo $ResultadoTorneo->getPuestoId() ?></td>
      <td><?php echo $ResultadoTorneo->getTorneoCatId() ?></td>
      <td><?php echo $ResultadoTorneo->getPelotariNroDoc() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('resultado_torneo_abm/new') ?>">New</a>
