<h1>Personas List</h1>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Nro doc</th>
      <th>Nom apellido</th>
      <th>Fecha nacimiento</th>
      <th>E mail</th>
      <th>Localidad</th>
      <th>Editar Persona</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Personas as $Persona): ?>
    <tr>
      <td><?php echo $Persona->getNroDoc() ?></td>
      <td><?php echo $Persona->getNomApellido() ?></td>
      <td><?php echo $Persona->getFechaNacimiento() ?></td>
      <td><?php echo $Persona->getEMail() ?></td>
      <td><?php echo $Persona->getLocalidadId() ?></td>
      <td><a href="<?php echo url_for('persona_abm/edit?nro_doc='.$Persona->getNroDoc()) ?>"> Editar </a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('persona_abm/new') ?>">New</a>
