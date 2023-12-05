<?php

namespace App\Livewire;

use App\Models\Classes as ModelsClasses;
use Livewire\Component;
use Livewire\WithPagination;

class Classes extends Component
{
    use WithPagination;

    public $class_name = '';
    public $school_year = '';
    public $course_id = 0;

    public function render()
    {
        $classes = ModelsClasses::paginate(10);
        return view('livewire.classes',['classes' => $classes])->extends('layouts.base')->slot('content');
    }
    
    public function save(){
        ModelsClasses::create(
            $this->only(['class_name', 'school_year','course_id'])
        );

        $this->class_name = "";
        $this->school_year = "";

        $this->dispatch('student-created'); 
 
        // return $this->redirect('/posts')->with('status', 'Post successfully created.');
    }


    public function delete($id){
        $student = ModelsClasses::where('id',$id)->delete();
        $this->dispatch('student-deleted'); 
    }
}
