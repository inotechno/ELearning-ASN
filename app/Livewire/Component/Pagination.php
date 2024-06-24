<?php

namespace App\Livewire\Component;

use Livewire\Component;
use Livewire\WithPagination;

class Pagination extends Component
{
    use WithPagination;

    public $page = 1;
    public $perPage = 6; // Number of items per page

    public $lastPage;
    protected $paginationTheme = 'bootstrap'; // Optional: If using Bootstrap pagination styling

    public function mount($page, $lastPage)
    {
        $this->page = $page;
        $this->lastPage = $lastPage;
    }

    public function render()
    {
        return view('livewire.component.pagination');
    }

    public function previousPage()
    {
        if ($this->page > 1) {
            $this->page--;
        }
    }

    public function nextPage()
    {
        if ($this->page < $this->lastPage) {
            $this->page++;
        }
    }

    public function gotoPage($page)
    {
        $this->page = $page;
    }
}
