<?php

class CustomController extends \BaseController {
    
    public function getTeachers()
    {
        $teachers = Teacher::all()->map(function($t) {
            return [
                'id' => $t->id,
                'value' => sprintf("%s %s %s", $t->name, $t->name2, $t->surname),
            ];
        });
        return Response::json($teachers);
    }
    
    
    
    public function getCurriculums()
    {
        $curs = Curriculum::with('type', 'subject')->get()->map(function($cur) {
            return [
                'id' => $cur->id,
                'value' => sprintf("%s: %s", $cur->subject->title, $cur->type->type),
            ];
        });
        return Response::json($curs);
    }
    
    public function getCurriculumTypes()
    {
        $curs = CurriculumType::all()->map(function($cur) {
            return [
                'id' => $cur->id,
                'value' => $cur->type,
            ];
        });
        return Response::json($curs);
    }
    
    public function getPositions()
    {
        $positions = Position::all()->map(function($pos) {
            return [
                'id' => $pos->id,
                'value' => $pos->position,
            ];
        });
        return Response::json($positions);
    }
    
    public function getSubjects()
    {
        $subjects = Subject::all()->map(function($subj) {
            return [
                'id' => $subj->id,
                'value' => $subj->title,
            ];
        });
        return Response::json($subjects);
    }
}

?>