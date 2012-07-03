<h1>Categorias List</h1>

<table>
<thead style="background: #7FDDCA">
    <tr>
      <th>Id</th>
      <th>Descripcion categoria</th>
      <th>Edad min</th>
      <th>Edad max</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Categorias as $Categoria): ?>
    <tr>
      <td><a href="<?php echo url_for('categoria_abm/edit?id='.$Categoria->getId()) ?>"><?php echo $Categoria->getId() ?></a></td>
      <td><?php echo $Categoria->getDescripcionCategoria() ?></td>
      <td><?php echo $Categoria->getEdadMin() ?></td>
      <td><?php echo $Categoria->getEdadMax() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('categoria_abm/new') ?>">New</a>
