<?php

class Subject extends Eloquent
{
    protected $fillable = ['title'];

    public function curriculums()
    {
        return $this->hasMany('Curriculum');
    }

    public function teachers()
    {
        return $this->belongsToMany('Teacher');
    }
} 