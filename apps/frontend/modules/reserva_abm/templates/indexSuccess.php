<?php /* @var $Reserva Reserva */ ?>
<h1 class="alert-info">Reservas de Hoy</h1>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Nombre Socio</th>  
      <th>Socio DNI</th>
      <th>Tipo reserva</th>
      <th>Hora comienzo reserva</th>
      <th>Hora fin reserva</th>
      <th>Cantidad turnos</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Reservas as $Reserva): ?>
    <tr>
      <td><?php echo $Reserva->getNombreSocio($Reserva->getSocioNroDoc()) ?></td>
      <td><?php echo $Reserva->getSocioNroDoc() ?></td>
      <td><?php echo $Reserva->getTipoReserva()->getDescirpcionReserva() ?></td>
      <td><?php echo $Reserva->getHoraComienzoReserva() ?></td>
      <td><?php echo $Reserva->getHoraFinReserva() ?></td>
      <td><?php echo $Reserva->getCantidadTurnos() ?></td>
      <td><a class="btn btn-warning btn-mini" href="<?php echo url_for('reserva_abm/edit?socio_nro_doc='.$Reserva->getSocioNroDoc().'&tipo_reserva_id='.$Reserva->getTipoReservaId().'&dia_comienzo_reserva='.$Reserva->getDiaComienzoReserva().'&hora_comienzo_reserva='.$Reserva->getHoraComienzoReserva()) ?>"><i class="icon-pencil icon-white"></i>Modificar</a>
              <?php echo link_to('<i class="icon-trash icon-white"></i>Eliminar', 'reserva_abm/delete?socio_nro_doc='.$Reserva->getSocioNroDoc().'&tipo_reserva_id='.$Reserva->getTipoReservaId().'&dia_comienzo_reserva='.$Reserva->getDiaComienzoReserva().'&hora_comienzo_reserva='.$Reserva->getHoraComienzoReserva(), array('method' => 'delete', 'confirm' => 'Estas seguro de eliminar?', 'class'=>"btn btn-danger btn-mini")) ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="btn btn-info" href="<?php echo url_for('reserva_abm/new') ?>">Nueva Reserva</a>
