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
          <br>&nbsp;<a class="btn" href="<?php echo url_for('provincia_abm/index') ?>">Cargar localidad/provincia</a><br><br>
          &nbsp;<a class="btn" href="<?php echo url_for('persona_abm/index') ?>">Atras</a>
          
          <input class="btn" type="submit" value="Guardar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
</form>
