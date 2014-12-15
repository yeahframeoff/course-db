<?php

class Curriculum extends Eloquent
{
    protected $fillable = ['subject_id', 'type_id', 'hours'];

    public $timestamps = false;

    public function subject()
    {
        return $this->belongsTo('Subject');
    }
    
    public function type()
    {
        return $this->belongsTo('CurriculumType');
    }
    
    public static function keys()
    {
        return [
            'id',
            'subject_id',
            'type_id',
            'hours',
        ];
    }
} 