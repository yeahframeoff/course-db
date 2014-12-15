<?php

class Position extends Eloquent
{
    protected $fillable = ['position'];
    
    public static function keys() {
        return [
            'id',
            'position',
        ];
    }
} 