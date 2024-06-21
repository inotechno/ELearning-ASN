<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class DashboardIndex extends Component
{
    public $breadcrumbData = [
        ['label' => 'Dashboard', 'url' => '/'],
    ];

    public function render()
    {
        return view('livewire.dashboard.dashboard-index')->title(__('Dashboard'))->layout('layouts.app', ['breadcrumbData' => $this->breadcrumbData]);
    }
}
