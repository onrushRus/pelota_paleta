<h1>Socios List</h1>

<table>
  <thead>
    <tr>
      <th>Persona nro doc</th>
      <th>Fecha alta</th>
      <th>Vitalicio</th>
      <th>Activo</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Socios as $Socio): ?>
    <tr>
      <td><a href="<?php echo url_for('socio_abm/edit?persona_nro_doc='.$Socio->getPersonaNroDoc()) ?>"><?php echo $Socio->getPersonaNroDoc() ?></a></td>
      <td><?php echo $Socio->getFechaAlta() ?></td>
      <td><?php echo $Socio->getVitalicio() ?></td>
      <td><?php echo $Socio->getActivo() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('socio_abm/new') ?>">New</a>
