<h1>Personas</h1>

<table class="table table-bordered">
  <thead style="background: #7FDDCA">
    <tr>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Nro documento</th>
      <th>Fecha nacimiento</th>
      <th>E-mail</th>
      <th>Localidad</th>
      <th>Editar Persona</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Personas as $Persona): ?>
    <tr>
      <td><?php echo $Persona->getNomApellido() ?></td>
      <td><?php echo $Persona->getApellido() ?></td>
      <td><?php echo $Persona->getNroDoc() ?></td>
      <td><?php echo $Persona->getFechaNacimiento('d-m-Y') ?></td>
      <td><?php echo $Persona->getEMail() ?></td>
      <td><?php echo $Persona->getLocalidad() ?></td>
      <td><a class="btn btn-warning btn-mini" href="<?php echo url_for('persona_abm/edit?nro_doc='.$Persona->getNroDoc()) ?>"><i class="icon-pencil icon-white"></i> Modificar</a>
          <?php echo link_to('<i class="icon-trash icon-white"></i>Eliminar', 'persona_abm/delete?nro_doc='.$Persona->getNroDoc(), array('method' => 'delete', 'confirm' => 'Esta seguro de eliminar?', 'class'=>"btn btn-danger btn-mini")) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="btn btn-info" href="<?php echo url_for('persona_abm/new') ?>">Nueva Persona</a>
