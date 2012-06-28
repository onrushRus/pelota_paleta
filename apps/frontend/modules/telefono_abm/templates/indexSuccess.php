<h1>Telefonos List</h1>

<table>
  <thead>
    <tr>
      <th>Persona nro doc</th>
      <th>Telefono nro</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Telefonos as $Telefono): ?>
    <tr>
      <td><a href="<?php echo url_for('telefono_abm/edit?persona_nro_doc='.$Telefono->getPersonaNroDoc().'&telefono_nro='.$Telefono->getTelefonoNro()) ?>"><?php echo $Telefono->getPersonaNroDoc() ?></a></td>
      <td><a href="<?php echo url_for('telefono_abm/edit?persona_nro_doc='.$Telefono->getPersonaNroDoc().'&telefono_nro='.$Telefono->getTelefonoNro()) ?>"><?php echo $Telefono->getTelefonoNro() ?></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('telefono_abm/new') ?>">New</a>
