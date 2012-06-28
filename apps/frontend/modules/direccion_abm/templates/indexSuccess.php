<h1>Direccions List</h1>

<table>
  <thead>
    <tr>
      <th>Persona nro doc</th>
      <th>Calle</th>
      <th>Numero</th>
      <th>Monoblock edif</th>
      <th>Piso</th>
      <th>Dpto</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Direccions as $Direccion): ?>
    <tr>
      <td><a href="<?php echo url_for('direccion_abm/edit?persona_nro_doc='.$Direccion->getPersonaNroDoc().'&calle='.$Direccion->getCalle().'&numero='.$Direccion->getNumero()) ?>"><?php echo $Direccion->getPersonaNroDoc() ?></a></td>
      <td><a href="<?php echo url_for('direccion_abm/edit?persona_nro_doc='.$Direccion->getPersonaNroDoc().'&calle='.$Direccion->getCalle().'&numero='.$Direccion->getNumero()) ?>"><?php echo $Direccion->getCalle() ?></a></td>
      <td><a href="<?php echo url_for('direccion_abm/edit?persona_nro_doc='.$Direccion->getPersonaNroDoc().'&calle='.$Direccion->getCalle().'&numero='.$Direccion->getNumero()) ?>"><?php echo $Direccion->getNumero() ?></a></td>
      <td><?php echo $Direccion->getMonoblockEdif() ?></td>
      <td><?php echo $Direccion->getPiso() ?></td>
      <td><?php echo $Direccion->getDpto() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('direccion_abm/new') ?>">New</a>
