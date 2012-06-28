<h1>TipoReservas List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Descirpcion reserva</th>
      <th>Tiempo reserva</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($TipoReservas as $TipoReserva): ?>
    <tr>
      <td><a href="<?php echo url_for('tipo_reserva_abm/edit?id='.$TipoReserva->getId()) ?>"><?php echo $TipoReserva->getId() ?></a></td>
      <td><?php echo $TipoReserva->getDescirpcionReserva() ?></td>
      <td><?php echo $TipoReserva->getTiempoReserva() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('tipo_reserva_abm/new') ?>">New</a>
