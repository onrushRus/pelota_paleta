<?php



/**
 * Skeleton subclass for representing a row from the 'torneo_categoria' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class TorneoCategoria extends BaseTorneoCategoria {
    
public function getTorncat(){
    $aux='Torneo: '.$this->getTorneo().', Categoria: '.$this->getCategoria();
    return $aux;
}

} // TorneoCategoria
