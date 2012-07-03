<h1>Rankings List</h1>

<table>
  <thead style="background: #7FDDCA">
    <tr>
      <th>Pelotari nro doc</th>
      <th>Tipo ranking</th>
      <th>Categoria</th>
      <th>Pelotari puntos</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Rankings as $Ranking): ?>
    <tr>
      <td><a href="<?php echo url_for('ranking_abm/edit?pelotari_nro_doc='.$Ranking->getPelotariNroDoc().'&tipo_ranking='.$Ranking->getTipoRanking().'&categoria_id='.$Ranking->getCategoriaId()) ?>"><?php echo $Ranking->getPelotariNroDoc() ?></a></td>
      <td><a href="<?php echo url_for('ranking_abm/edit?pelotari_nro_doc='.$Ranking->getPelotariNroDoc().'&tipo_ranking='.$Ranking->getTipoRanking().'&categoria_id='.$Ranking->getCategoriaId()) ?>"><?php echo $Ranking->getTipoRanking() ?></a></td>
      <td><a href="<?php echo url_for('ranking_abm/edit?pelotari_nro_doc='.$Ranking->getPelotariNroDoc().'&tipo_ranking='.$Ranking->getTipoRanking().'&categoria_id='.$Ranking->getCategoriaId()) ?>"><?php echo $Ranking->getCategoriaId() ?></a></td>
      <td><?php echo $Ranking->getPelotariPuntos() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('ranking_abm/new') ?>">New</a>
