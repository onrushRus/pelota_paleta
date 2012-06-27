<?php /*@var $Socio Socio*/?>
<h1>Socios</h1>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Nro documento</th>
      <th>Nombre - Apellido</th>
      <th>Fecha alta</th>
      <th>Vitalicio</th>
      <th>Activo</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Socios as $Socio): ?>
    <tr>
      <td><?php echo $Socio->getPersonaNroDoc()?></td>
      <td><?php echo $Socio->getPersona()->getNomApellido()?></td>
      <td><?php echo $Socio->getFechaAlta() ?></td>
      <td><?php echo $Socio->getVitalicio() ?></td>
      <td><?php echo $Socio->getActivo() ?></td>
      <td><a href="<?php echo url_for('socio_abm/edit?persona_nro_doc='.$Socio->getPersonaNroDoc()) ?>">Modificar</a></td>
      <td><?php echo link_to('Eliminar', 'socio_abm/delete?persona_nro_doc='.$Socio->getPersonaNroDoc(), array('method' => 'delete', 'confirm' => '¿Estas seguro?')) ?></td>

    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('socio_abm/new') ?>">Nuevo Socio</a>
