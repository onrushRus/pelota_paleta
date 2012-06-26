<?php /*@var $Socio Socio*/?>
<h1>Socios List</h1>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Persona nro doc</th>
      <th>Nombre Socio</th>
      <th>Fecha alta</th>
      <th>Vitalicio</th>
      <th>Activo</th>
      <th>Editar Socio</th>
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
      <td><a href="<?php echo url_for('socio_abm/edit?persona_nro_doc='.$Socio->getPersonaNroDoc()) ?>">Editar</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('socio_abm/new') ?>">New</a>
