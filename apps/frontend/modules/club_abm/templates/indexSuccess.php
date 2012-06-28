<h1>Clubs List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre club</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Clubs as $Club): ?>
    <tr>
      <td><a href="<?php echo url_for('club_abm/edit?id='.$Club->getId()) ?>"><?php echo $Club->getId() ?></a></td>
      <td><?php echo $Club->getNombreClub() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('club_abm/new') ?>">New</a>
