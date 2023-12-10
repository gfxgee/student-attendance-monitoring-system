<?php

namespace App\Livewire;

use App\Models\Classes;
use App\Models\Students;
use Livewire\Component;

class Attendance extends Component
{
    public $class_id = 0;

    public function render()
    {
        $classes = Classes::paginate(10);
        $students = Students::where('class_id',$this->class_id)->get();
        return view('livewire.attendance',['classes' => $classes, 'students' => $students])->extends('layouts.base')->slot('content');
    }
}
