<h1>PuntosPuestos List</h1>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Id</th>
      <th>Puntos por puesto</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($PuntosPuestos as $PuntosPuesto): ?>
    <tr>
      <td><a href="<?php echo url_for('puntos_puesto_abm/edit?id='.$PuntosPuesto->getId()) ?>"><?php echo $PuntosPuesto->getId() ?></a></td>
      <td><?php echo $PuntosPuesto->getPuesto() ?></td>
      <td><?php echo $PuntosPuesto->getPuntosPorPuesto() ?></td>
      <td>
          <a class="btn btn-warning btn-mini" href="<?php echo url_for('puntos_puesto_abm/edit?id='.$PuntosPuesto->getId()) ?>"><i class="icon-pencil icon-white"></i>Modificar</a>
          <?php echo link_to('<i class="icon-trash icon-white"></i>Eliminar', 'puntos_puesto_abm/delete?id='.$PuntosPuesto->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro de Eliminar?', 'class'=>"btn btn-danger btn-mini")) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="btn btn-info" href="<?php echo url_for('puntos_puesto_abm/new') ?>">Nuevo Punto-Puesto</a>
