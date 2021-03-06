<?php /*@var $Socio Socio*/?>
<h1>Socios</h1>

<table class="table table-bordered">
  <thead style="background: #7FDDCA">
    <tr>
      <th>Nro documento</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Fecha alta</th>
      <th>Vitalicio</th>
      <th>Activo</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Socios as $Socio): ?>
    <tr>
      <td><?php echo $Socio->getPersonaNroDoc()?></td>
      <td><?php echo $Socio->getPersona()->getNomApellido()?></td>
      <td><?php echo $Socio->getPersona()->getApellido()?></td>
      <td><?php echo $Socio->getFechaAlta('d-m-Y') ?></td>
      <td><i class="icon-<?php echo $Socio->getIconoVitalicio() ?>"></i></td>
      <td><i class="icon-<?php echo $Socio->getIconoActivo() ?>"></i></td>
      <td><a class="btn btn-warning btn-mini" href="<?php echo url_for('socio_abm/edit?persona_nro_doc='.$Socio->getPersonaNroDoc()) ?>"><i class="icon-pencil icon-white"></i> Modificar</a>
              <?php echo link_to('<i class="icon-trash icon-white"></i>Eliminar', 'socio_abm/delete?persona_nro_doc='.$Socio->getPersonaNroDoc(), array('method' => 'delete', 'confirm' => 'Estas seguro de eliminar?', 'class'=>"btn btn-danger btn-mini")) ?></td>

    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="btn btn-info" href="<?php echo url_for('socio_abm/new') ?>">Nuevo Socio</a>
