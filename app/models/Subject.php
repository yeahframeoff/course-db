<?php

class Subject extends Eloquent
{
    protected $fillable = ['title'];
    
    public $timestamps = false;

    public function curriculums()
    {
        return $this->hasMany('Curriculum');
    }

    public function teachers()
    {
        return $this->belongsToMany('Teacher');
    }
    
    public static function keys() {
        return [
            'id',
            'title',
        ];
    }
} 