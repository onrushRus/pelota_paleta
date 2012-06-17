<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('persona_abm/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?nro_doc='.$form->getObject()->getNroDoc() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('persona_abm/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'persona_abm/delete?nro_doc='.$form->getObject()->getNroDoc(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['nro_doc']->renderLabel() ?></th>
        <td>
          <?php echo $form['nro_doc']->renderError() ?>
          <?php echo $form['nro_doc'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nom_apellido']->renderLabel() ?></th>
        <td>
          <?php echo $form['nom_apellido']->renderError() ?>
          <?php echo $form['nom_apellido'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fecha_nacimiento']->renderLabel() ?></th>
        <td>
          <?php echo $form['fecha_nacimiento']->renderError() ?>
          <?php echo $form['fecha_nacimiento'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['e_mail']->renderLabel() ?></th>
        <td>
          <?php echo $form['e_mail']->renderError() ?>
          <?php echo $form['e_mail'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['localidad_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['localidad_id']->renderError() ?>
          <?php echo $form['localidad_id'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
