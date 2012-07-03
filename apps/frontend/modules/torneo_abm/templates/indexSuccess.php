<h1>Torneos</h1>

<table class="table table-bordered">

  <thead style="background: #7FDDCA">
    <tr>
      <th>Id</th>
      <th>Año</th>
      <th>Nombre</th>
      <th>Tipo torneo</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Torneos as $Torneo): ?>
    <tr>
      <td><?php echo $Torneo->getId() ?></td>
      <td><?php echo $Torneo->getAnio() ?></td>
      <td><?php echo $Torneo->getNombre() ?></td>
      <td><?php if  (!$Torneo->getTipoTorneo()){echo "Torneo local";}
      else {echo "Torneo nacional/patagonico";}?></td>
      <td>
          <a class="btn btn-warning btn-mini" href="<?php echo url_for('torneo_abm/edit?id='.$Torneo->getId()) ?>"><i class="icon-pencil icon-white"></i>Modificar</a>
          <?php echo link_to('<i class="icon-trash icon-white"></i>Eliminar', 'torneo_abm/delete?id='.$Torneo->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro de eliminar?', 'class'=>"btn btn-danger btn-mini")) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="btn btn-info" href="<?php echo url_for('torneo_abm/new') ?>">Nuevo Torneo</a>
