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
        
        $data = [
            'name' => $participant->front_name . ' ' . $participant->back_name,
            'course' => $course->title,
            'date' => now()->format('F d, Y')
        ];
        // return view('certificates.template', $data);
        $pdf = Pdf::loadView('certificates.template', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('certificate.pdf');
    }
}
