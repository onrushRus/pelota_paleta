<h1>Clubs</h1>

<table class="table table-bordered">

<thead style="background: #7FDDCA">
    <tr>
      <th>Identificador</th>
      <th>Nombre</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Clubs as $Club): ?>
    <tr>
      <td><?php echo $Club->getId() ?></td>
      <td><?php echo $Club->getNombreClub() ?></td>
      <td>
          <a class="btn btn-warning btn-mini" href="<?php echo url_for('club_abm/edit?id='.$Club->getId()) ?>"><i class="icon-pencil icon-white"></i>Modificar</a>
          <?php echo link_to('<i class="icon-trash icon-white"></i>Eliminar', 'club_abm/delete?id='.$Club->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro de eliminar?', 'class'=>"btn btn-danger btn-mini")) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="btn btn-info" href="<?php echo url_for('club_abm/new') ?>">Nuevo Club</a>
