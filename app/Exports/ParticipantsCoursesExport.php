<?php

namespace App\Exports;

use App\Models\Participant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ParticipantsCoursesExport implements FromView
{
    protected $participants_courses;

    public function __construct($participants_courses)
    {
        $this->participants_courses = $participants_courses;
    }

    public function view(): View
    {
        return view('exports.participants-courses', [
            'participants_courses' => $this->participants_courses
        ]);
    }
}
