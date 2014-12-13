<?php

class Curriculum extends Eloquent
{
    protected $fillable = ['subject_id', 'type', 'hours'];

    public function subject()
    {
        return $this->belongsTo('Subject');
    }
} 