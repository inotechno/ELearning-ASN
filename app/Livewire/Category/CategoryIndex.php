<?php

namespace App\Livewire\Category;

use App\Models\CategoryCourse;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Illuminate\Support\Str;

class CategoryIndex extends Component
{
    use LivewireAlert;

    public $search;
    public $name, $category;
    public $category_id;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public $breadcrumbData = [
        ['label' => 'Category', 'url' => '/category'],
    ];

    protected $listeners = ['delete'];

    public function resetForm()
    {
        $this->name = '';
        $this->category_id = '';
        $this->category = null;
    }

    public function create()
    {
        $this->resetForm();
        $this->dispatch('showCreateModal');
    }

    public function store($close)
    {
        $this->validate([
            'name' => 'required',
        ]);

        try {
            $this->category = CategoryCourse::create([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
            ]);

            if ($close) {
                $this->dispatch('closeCreateModal');
            }
            
            $this->resetForm();
            $this->alert('success', 'Category Created');
        } catch (\Exception $e) {
            $this->alert('error', $e->getMessage());
        }
    }

    public function confirmDelete($id)
    {
        $this->category_id = $id;
        $this->confirm('Are you sure you want to delete this category?', [
            'icon' => 'warning',
            'position' => 'center',
            'toast' => false,
            'timer' => null,
            'text' => 'If yes, click the button below!',
            'cancel' => true,
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'onConfirmed' => 'delete',
            'confirmButtonText' => 'Yes, Delete it!',
            'confirmButtonColor' => '#d33',
            'cancelButtonColor' => '#3085d6'
        ]);
    }

    public function delete()
    {
        try {
            $category = CategoryCourse::find($this->category_id);
            $category->delete();
            $this->alert('success', 'Category Deleted');
        } catch (\Exception $e) {
            $this->alert('error', $e->getMessage());
        }
    }


    public function edit($id)
    {
        $this->category = CategoryCourse::find($id);
        $this->name = $this->category->name;
        $this->category_id = $id;

        $this->dispatch('showEditModal');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
        ]);

        try {
            $this->category->update([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
            ]);

            $this->dispatch('closeEditModal');
            $this->alert('success', 'Category Updated');
        } catch (\Exception $e) {
            $this->alert('error', $e->getMessage());
        }
    }

    public function render()
    {
        $categories = CategoryCourse::when($this->search, function ($builder) {
            $builder->where('name', 'like', '%' . $this->search . '%');
        })->paginate(10);

        return view('livewire.category.category-index', compact('categories'))->title(__('Category'))->layout('layouts.app', ['breadcrumbData' => $this->breadcrumbData]);
    }
}
