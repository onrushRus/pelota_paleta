<h1>Inscriptos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Persona nro doc</th>
      <th>Torneo cat</th>
      <th>Nro equipo</th>
      <th>Club representado</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Inscriptos as $Inscripto): ?>
    <tr>
      <td><a href="<?php echo url_for('inscripto_abm/edit?id='.$Inscripto->getId()) ?>"><?php echo $Inscripto->getId() ?></a></td>
      <td><?php echo $Inscripto->getPersonaNroDoc() ?></td>
      <td><?php echo $Inscripto->getTorneoCatId() ?></td>
      <td><?php echo $Inscripto->getNroEquipo() ?></td>
      <td><?php echo $Inscripto->getClubRepresentado() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('inscripto_abm/new') ?>">New</a>
