<?php

namespace App\Livewire\Certificate;

use Livewire\Component;

class CertificateIndex extends Component
{
    public $breadcrumbData;

    public function mount()
    {

        // Set Breadcrumb
        $this->breadcrumbData = [
            ['label' => 'My Course', 'url' => '/my-course'],
            ['label' => 'Certificate', 'url' => '/my-course/certificate'],
        ];
    }
    public function render()
    {
        return view('livewire.certificate.certificate-index')->layout('layouts.app', ['breadcrumbData' => $this->breadcrumbData, 'title' => 'Certificate']);
    }
}
