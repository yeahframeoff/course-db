<?php

class Position extends Eloquent
{
    protected $fillable = ['position'];
    
    public $timestamps = false;

    public static function keys() {
        return [
            'id',
            'position',
        ];
    }
} 