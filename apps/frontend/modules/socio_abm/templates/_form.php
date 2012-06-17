<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('socio_abm/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?persona_nro_doc='.$form->getObject()->getPersonaNroDoc() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('socio_abm/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'socio_abm/delete?persona_nro_doc='.$form->getObject()->getPersonaNroDoc(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['persona_nro_doc']->renderLabel() ?></th>
        <td>
          <?php echo $form['persona_nro_doc']->renderError() ?>
          <?php echo $form['persona_nro_doc'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fecha_alta']->renderLabel() ?></th>
        <td>
          <?php echo $form['fecha_alta']->renderError() ?>
          <?php echo $form['fecha_alta'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['vitalicio']->renderLabel() ?></th>
        <td>
          <?php echo $form['vitalicio']->renderError() ?>
          <?php echo $form['vitalicio'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['activo']->renderLabel() ?></th>
        <td>
          <?php echo $form['activo']->renderError() ?>
          <?php echo $form['activo'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
