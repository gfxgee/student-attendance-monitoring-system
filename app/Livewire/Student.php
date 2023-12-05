<?php

namespace App\Livewire;

use App\Models\Students;
use Livewire\Component;
use Livewire\WithPagination;
class Student extends Component
{
    use WithPagination;

    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $birthdate;

    public function render()
    {
        $students = Students::paginate(10);
        return view('livewire.student', ['students' => $students])->extends('layouts.base')->slot('content');
    }

    public function save()
    {
        Students::create(
            $this->only(['first_name', 'last_name', 'email', 'birthdate'])
        );

        $this->first_name = "";
        $this->last_name = "";
        $this->email = "";
        $this->birthdate = "";

        $this->dispatch('student-created'); 
 
        // return $this->redirect('/posts')->with('status', 'Post successfully created.');
    }


    public function delete($id){
        $student = Students::where('id',$id)->delete();
        $this->dispatch('student-deleted'); 
    }
}
