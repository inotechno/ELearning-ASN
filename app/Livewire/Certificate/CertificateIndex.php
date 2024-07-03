<?php

namespace App\Livewire\Certificate;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CertificateIndex extends Component
{
    public $breadcrumbData, $generate_certificate_url, $download_certificate_url, $title, $user;

    public function mount($slug)
    {
        $this->user = Auth::user();
        $course = Course::where('slug', $slug)->first();
        $this->title = $course->title;
        $participant_id = $this->user->participant->id;
        $this->generate_certificate_url = url("/certificate/{$slug}/{$participant_id}/generate");
        $this->download_certificate_url = url("/certificate/{$slug}/{$participant_id}/download");
        // Set Breadcrumb
        $this->breadcrumbData = [
            ['label' => 'My Course', 'url' => '/my-course'],
            ['label' => 'Certificate', 'url' => '/my-course/certificate'],
        ];
    }

    public function render()
    {
        // dd($this->certificate_url);
        return view('livewire.certificate.certificate-index')->layout('layouts.app', ['breadcrumbData' => $this->breadcrumbData, 'title' => 'Certificate']);
    }
}
