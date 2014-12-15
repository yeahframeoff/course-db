<?php

class Teacher extends Eloquent
{
    protected $fillable = [
        'name', 'name2', 'surname',
        'date_of_birth', 'gender', 'department', 'position_id'
    ];

    public $timestamps = false;

    public function position()
    {
        return $this->belongsTo('Position');
    }

    public function curriculums()
    {
        return $this->belongsToMany('Curriculum');
    }
    
    public static function keys() {
        return [
            'id',
            'name',
            'name2',
            'surname',
            'date_of_birth',
            'gender',
            'department',
            'position_id'
        ];
    }
}