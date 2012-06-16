<fieldset><legend>Reservar cancha</legend>
    <form action="control_reserva_cancha.html" method="POST">
        <label>Dni Socio: </label><input type="text" value="Ej: 32888971" name="dni_socio"><br/>
        <label>Fecha inicio: </label><input type="text" value="Ej: 12/08/2012" name="dia_reserva_cancha"><br/>
        <label>Hora inicio: </label><input type="text" value="Ej: 18:00:00" name="hora_reserva_cancha"><br/>
        <label>Fecha fin: </label><input type="text" value="Igual anterior" name="dia_fin_reserva_cancha"><br/>
        <label>Hora fin: </label><input type="text" value="Anterior + 90 Min " name="hora_fin_reserva_cancha"><br/>
        <label>Tipo: </label><input type="text" disabled="disabled" value="cancha" name="tipo_reserva"><br/>
        <br/><input type="submit" value="Reservar">
        <a href="error_reserva_cancha.html">reservar con error</a><br/>
    </form>
</fieldset>
<a href="<?php echo url_for('cancha/index');?>">Menu Cancha</a>