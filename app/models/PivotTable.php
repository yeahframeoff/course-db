<?php

class PivotTable extends Eloquent
{
    protected $table = 'teachers_curriculums';
    public $timestamps = false;
    
    public static function keys()
    {
        return [
            'id',
            'teacher_id',
            'curriculum_id',
            'hours',
        ];
    }
}