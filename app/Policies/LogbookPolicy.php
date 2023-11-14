<?php

namespace App\Policies;

use App\Models\Logbook;
use App\Models\Student;

class LogbookPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Student $student)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Student $student, Logbook $logbook)
    {
        dd($student->id === $logbook->student_id);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Student $student)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Student $student, Logbook $logbook)
    {
        dd($student->id === $logbook->student_id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Student $student, Logbook $logbook)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Student $student, Logbook $logbook)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Student $student, Logbook $logbook)
    {
        //
    }
}
