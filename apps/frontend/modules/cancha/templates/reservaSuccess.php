<fieldset><legend>Reservar cancha</legend>
    <form action="<?php url_for('cancha/reserva');?>" method="POST">
        <label>Dni Socio: </label><input type="text" value="32888971" name="dni_socio"><br/>
        <label>Fecha inicio: </label><input type="text" value="12/08/2012" name="dia_reserva_cancha"><br/>
        <label>Hora inicio: </label><input type="text" value="18:00:00" name="hora_reserva_cancha"><br/>
        <label>Fecha fin: </label><input type="text" value="18:00:00" name="dia_fin_reserva_cancha"><br/>
        <label>Hora fin: </label><input type="text" value="+ 90 min" name="hora_fin_reserva_cancha"><br/>
        <label>Tipo reserva: </label><input type="text" disabled="disabled" value="cancha" name="tipo_reserva"><br/>
        <br/><input type="submit" value="Reservar">
    </form>
</fieldset>
<a href="<?php echo url_for('cancha/index');?>">Menu Cancha</a>