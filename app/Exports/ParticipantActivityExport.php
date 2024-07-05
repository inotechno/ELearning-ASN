<?php

namespace App\Exports;

use App\Models\ParticipantActivity;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ParticipantActivityExport implements FromView
{
    protected $participant_activities;

    public function __construct($participant_activities)
    {
        $this->participant_activities = $participant_activities;
    }

    public function view(): View
    {
        return view('exports.participant-activity', [
            'participant_activities' => $this->participant_activities
        ]);
    }
}
