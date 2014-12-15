<?php

/*
 * To change this template use Tools | Templates.
 */

/**
 * Description of newPHPClass
 *
 * @author yeahframeoff
 */
class CurriculumType extends Eloquent {
    
    public $fillable = ['type'];
    
    public $timestamps = false;
    
    public static function keys()
    {
        return [
            'id',
            'type',
        ];
    }
}

?>