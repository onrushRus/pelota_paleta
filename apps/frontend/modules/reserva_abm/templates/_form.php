<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('reserva_abm/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?socio_nro_doc='.$form->getObject()->getSocioNroDoc().'&tipo_reserva_id='.$form->getObject()->getTipoReservaId().'&dia_comienzo_reserva='.$form->getObject()->getDiaComienzoReserva().'&hora_comienzo_reserva='.$form->getObject()->getHoraComienzoReserva() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('reserva_abm/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'reserva_abm/delete?socio_nro_doc='.$form->getObject()->getSocioNroDoc().'&tipo_reserva_id='.$form->getObject()->getTipoReservaId().'&dia_comienzo_reserva='.$form->getObject()->getDiaComienzoReserva().'&hora_comienzo_reserva='.$form->getObject()->getHoraComienzoReserva(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
</form>
