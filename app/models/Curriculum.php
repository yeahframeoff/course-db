<?php

class Curriculum extends Eloquent
{
    protected $fillable = ['subject_id', 'type', 'hours'];

    public function subject()
    {
        return $this->belongsTo('Subject');
    }
    
    public static function keys() {
        return [
            'id',
            'subject_id',
            'type',
            'hours',
        ];
    }
} 