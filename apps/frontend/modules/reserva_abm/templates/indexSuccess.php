<?php /* @var $Reserva Reserva */ ?>
<h1 class="alert-info">Reservas de Hoy</h1>


<table class="table table-bordered">
  <thead>
    <tr>
      <th>Socio nro doc</th>
      <th>Tipo reserva</th>
      <th>Dia comienzo reserva</th>
      <th>Hora comienzo reserva</th>
      <th>Dia fin reserva</th>
      <th>Hora fin reserva</th>
      <th>Cantidad turnos</th>
      <th>Nombre Socio</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Reservas as $Reserva): ?>
    <tr>
      <td><a href="<?php echo url_for('reserva_abm/edit?socio_nro_doc='.$Reserva->getSocioNroDoc().'&tipo_reserva_id='.$Reserva->getTipoReservaId().'&dia_comienzo_reserva='.$Reserva->getDiaComienzoReserva().'&hora_comienzo_reserva='.$Reserva->getHoraComienzoReserva()) ?>"><?php echo $Reserva->getSocioNroDoc() ?></a></td>
      <td><a href="<?php echo url_for('reserva_abm/edit?socio_nro_doc='.$Reserva->getSocioNroDoc().'&tipo_reserva_id='.$Reserva->getTipoReservaId().'&dia_comienzo_reserva='.$Reserva->getDiaComienzoReserva().'&hora_comienzo_reserva='.$Reserva->getHoraComienzoReserva()) ?>"><?php echo $Reserva->getTipoReservaId() ?></a></td>
      <td><a href="<?php echo url_for('reserva_abm/edit?socio_nro_doc='.$Reserva->getSocioNroDoc().'&tipo_reserva_id='.$Reserva->getTipoReservaId().'&dia_comienzo_reserva='.$Reserva->getDiaComienzoReserva().'&hora_comienzo_reserva='.$Reserva->getHoraComienzoReserva()) ?>"><?php echo $Reserva->getDiaComienzoReserva() ?></a></td>
      <td><a href="<?php echo url_for('reserva_abm/edit?socio_nro_doc='.$Reserva->getSocioNroDoc().'&tipo_reserva_id='.$Reserva->getTipoReservaId().'&dia_comienzo_reserva='.$Reserva->getDiaComienzoReserva().'&hora_comienzo_reserva='.$Reserva->getHoraComienzoReserva()) ?>"><?php echo $Reserva->getHoraComienzoReserva() ?></a></td>
      <td><?php echo $Reserva->getDiaFinReserva() ?></td>
      <td><?php echo $Reserva->getHoraFinReserva() ?></td>
      <td><?php echo $Reserva->getCantidadTurnos() ?></td>
      <td><?php echo $Reserva->getNombreSocio($Reserva->getSocioNroDoc()) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('reserva_abm/new') ?>">New</a>
