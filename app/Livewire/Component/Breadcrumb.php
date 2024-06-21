<?php

namespace App\Livewire\Component;

use Livewire\Component;

class Breadcrumb extends Component
{
    public $breadcrumb = [];
    public $title;

    public function mount($breadcrumb, $title)
    {
        $this->breadcrumb = $breadcrumb;
        $this->title = $title;
    }

    public function render()
    {
        return view('livewire.component.breadcrumb');
    }
}
