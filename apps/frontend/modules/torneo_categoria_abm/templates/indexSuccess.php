<h1>TorneoCategorias List</h1>

<table>
  <thead>
    <tr>
      <th>Id torneo categoria</th>
      <th>Torneo</th>
      <th>Categoria</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($TorneoCategorias as $TorneoCategoria): ?>
    <tr>
      <td><a href="<?php echo url_for('torneo_categoria_abm/edit?id_torneo_categoria='.$TorneoCategoria->getIdTorneoCategoria()) ?>"><?php echo $TorneoCategoria->getIdTorneoCategoria() ?></a></td>
      <td><?php echo $TorneoCategoria->getTorneoId() ?></td>
      <td><?php echo $TorneoCategoria->getCategoriaId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('torneo_categoria_abm/new') ?>">New</a>
