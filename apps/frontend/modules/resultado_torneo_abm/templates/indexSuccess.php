<? /* @var $ResultadoTorneo ResultadoTorneo*/?>
<h1>Resultado de Torneos</h1>

<table class="table table-bordered">
  <thead style="background: #7FDDCA">
    <tr>
      <th>Identificador</th>
      <th>Puesto</th>
      <th>Torneo-Categoria</th>
      <th>Nro documento del participante</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($ResultadoTorneos as $ResultadoTorneo): ?>
    <tr>
      <td><?php echo $ResultadoTorneo->getId() ?></td>
      <td><?php echo $ResultadoTorneo->getPuestoId() ?></td>
      <td><?php echo $ResultadoTorneo->getTorneoCategoria()->getTorncat() ?></td>
      <td><?php echo $ResultadoTorneo->getPelotariNroDoc().' / '.$ResultadoTorneo->getInscripto()->getPersona()->getNomApellido().' '.$ResultadoTorneo->getInscripto()->getPersona()->getApellido()  ?></td>
      <td>
          <a class="btn btn-warning btn-mini"  href="<?php echo url_for('resultado_torneo_abm/edit?id='.$ResultadoTorneo->getId()) ?>"><i class="icon-pencil icon-white"></i>Modificar</a>
          <?php echo link_to('<i class="icon-trash icon-white"></i>Eliminar', 'resultado_torneo_abm/delete?id='.$ResultadoTorneo->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro de eliminar?', 'class'=>"btn btn-danger btn-mini" )) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="btn btn-info" href="<?php echo url_for('resultado_torneo_abm/new') ?>">Nuevo Resultado</a>
