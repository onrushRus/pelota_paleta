<h1>PuntosPuestos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Puntos por puesto</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($PuntosPuestos as $PuntosPuesto): ?>
    <tr>
      <td><a href="<?php echo url_for('puntos_puesto_abm/edit?id='.$PuntosPuesto->getId()) ?>"><?php echo $PuntosPuesto->getId() ?></a></td>
      <td><?php echo $PuntosPuesto->getPuntosPorPuesto() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('puntos_puesto_abm/new') ?>">New</a>
