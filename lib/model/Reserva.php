<?php



/**
 * Skeleton subclass for representing a row from the 'reserva' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class Reserva extends BaseReserva {

    public function getNombreSocio($dni_socio) 
    {
        $p = new Persona();
        $p = PersonaPeer::retrieveByPK($dni_socio);   //Fijate esta gaby pedaso de trolin JAJA
        return $p->getNomApellido();
    }
    

} // Reserva
