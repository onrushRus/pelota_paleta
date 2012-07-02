<?php /*@var $Inscripto Inscripto*/ ?>
<h1>Inscriptos</h1>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Identificador</th>
      <th>Nro documento</th>
      <th>Torneo-Categoria</th>
      <th>Nro equipo</th>
      <th>Club representado</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Inscriptos as $Inscripto): ?>
    <tr>
      <td><?php echo $Inscripto->getId() ?></td>
      <td><?php echo $Inscripto->getPersonaNroDoc() ?></td>
      <td><?php echo $Inscripto->getTorneoCategoria()->getTorncat() ?></td>
      <td><?php echo $Inscripto->getNroEquipo() ?></td>
      <td><?php echo $Inscripto->getClub()->getNombreClub() ?></td>
      <td>
          <a class="btn btn-warning btn-mini" href="<?php echo url_for('inscripto_abm/edit?id='.$Inscripto->getId()) ?>"><i class="icon-pencil icon-white"></i>Modificar</a>
          <?php echo link_to('<i class="icon-trash icon-white"></i>Eliminar', 'inscripto_abm/delete?id='.$Inscripto->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro de eliminar?', 'class'=>"btn btn-danger btn-mini")) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="btn btn-info" href="<?php echo url_for('inscripto_abm/new') ?>">Nuevo Inscripto</a>
