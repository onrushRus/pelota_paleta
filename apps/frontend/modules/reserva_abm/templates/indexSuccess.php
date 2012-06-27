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
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Reservas as $Reserva): ?>
    <tr>
      <td><?php echo $Reserva->getSocioNroDoc() ?></td>
      <td><?php echo $Reserva->getTipoReserva()->getDescirpcionReserva() ?></td>
      <td><?php echo $Reserva->getDiaComienzoReserva() ?></td>
      <td><?php echo $Reserva->getHoraComienzoReserva() ?></td>
      <td><?php echo $Reserva->getDiaFinReserva() ?></td>
      <td><?php echo $Reserva->getHoraFinReserva() ?></td>
      <td><?php echo $Reserva->getCantidadTurnos() ?></td>
      <td><?php echo $Reserva->getNombreSocio($Reserva->getSocioNroDoc()) ?></td>
      <td><a href="<?php echo url_for('reserva_abm/edit?socio_nro_doc='.$Reserva->getSocioNroDoc().'&tipo_reserva_id='.$Reserva->getTipoReservaId().'&dia_comienzo_reserva='.$Reserva->getDiaComienzoReserva().'&hora_comienzo_reserva='.$Reserva->getHoraComienzoReserva()) ?>">Editar</a></td>
      <td><?php echo link_to('Eliminar', 'reserva_abm/delete?socio_nro_doc='.$Reserva->getSocioNroDoc().'&tipo_reserva_id='.$Reserva->getTipoReservaId().'&dia_comienzo_reserva='.$Reserva->getDiaComienzoReserva().'&hora_comienzo_reserva='.$Reserva->getHoraComienzoReserva(), array('method' => 'delete', 'confirm' => '¿Estas seguro?')) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="btn btn-info" href="<?php echo url_for('reserva_abm/new') ?>">Nuevo</a>
