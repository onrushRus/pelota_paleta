<h1>Personas List</h1>

<table>
  <thead>
    <tr>
      <th>Nro doc</th>
      <th>Nom apellido</th>
      <th>Fecha nacimiento</th>
      <th>E mail</th>
      <th>Localidad</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Personas as $Persona): ?>
    <tr>
      <td><a href="<?php echo url_for('persona_abm/edit?nro_doc='.$Persona->getNroDoc()) ?>"><?php echo $Persona->getNroDoc() ?></a></td>
      <td><?php echo $Persona->getNomApellido() ?></td>
      <td><?php echo $Persona->getFechaNacimiento() ?></td>
      <td><?php echo $Persona->getEMail() ?></td>
      <td><?php echo $Persona->getLocalidadId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('persona_abm/new') ?>">New</a>
  <br><br>
 <a href="<?php echo url_for('principal/index');?>">Index</a>
