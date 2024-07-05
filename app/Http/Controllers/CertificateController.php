<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function generate($slug, $participant_id)
    {
        $participant = \App\Models\Participant::where('id', $participant_id)->firstOrFail();
        $course = \App\Models\Course::where('slug', $slug)->firstOrFail();
        $course_activity = $course->activities->where('participant_id', $participant_id)->sum('progress');
        // dd($course_activity);

        $qualification = "";
        if($course_activity == 100) {
            $qualification = "Sangat Baik";
        }else if($course_activity >= 80) {
            $qualification = "Baik";
        }

        $data = [
            'gelar_depan' => $participant->front_title,
            'gelar_belakang' => $participant->back_title,
            'name' => $participant->front_name . ' ' . $participant->back_name,
            'course' => $course->title,
            'qualification' => $qualification,
            'date' => now()->format('d M Y'),
        ];
        // return view('certificates.template', $data);
        $pdf = Pdf::loadView('certificates.template', $data)->setPaper('a4', 'landscape');
        return $pdf->stream("{$course->title}-{$participant->front_name}-{$participant->back_name}.pdf");
    }

    public function download($slug, $participant_id)
    {
        $participant = \App\Models\Participant::where('id', $participant_id)->firstOrFail();
        $course = \App\Models\Course::where('slug', $slug)->firstOrFail();
        $course_activity = $course->activities->where('participant_id', $participant_id)->sum('progress');
        // dd($course_activity);

        $qualification = "";
        if($course_activity == 100) {
            $qualification = "Sangat Baik";
        }else if($course_activity >= 80) {
            $qualification = "Baik";
        }

        $data = [
            'gelar_depan' => $participant->front_title,
            'gelar_belakang' => $participant->back_title,
            'name' => $participant->front_name . ' ' . $participant->back_name,
            'course' => $course->title,
            'qualification' => $qualification,
            'date' => now()->format('d M Y'),
        ];
        // return view('certificates.template', $data);
        $pdf = Pdf::loadView('certificates.template', $data)->setPaper('a4', 'landscape');
        return $pdf->download("{$course->title}-{$participant->front_name}-{$participant->back_name}.pdf");
    }    
}
