<?php

namespace App\Livewire\Category;

use App\Models\CategoryCourse;
use App\Models\TypeCourse;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Illuminate\Support\Str;

class CategoryIndex extends Component
{
    use LivewireAlert;

    public $search;
    public $name, $category;
    public $type, $type_id;
    public $category_id;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public $breadcrumbData = [
        ['label' => 'Category / Type', 'url' => '/category'],
    ];

    protected $listeners = ['delete', 'deleteType'];

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

    public function createType()
    {
        $this->resetForm();
        $this->dispatch('showCreateTypeModal');
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

    public function storeType($close)
    {
        $this->validate([
            'name' => 'required',
        ]);

        try {
            $this->type = TypeCourse::create([
                'name' => $this->name,
            ]);

            if ($close) {
                $this->dispatch('closeCreateTypeModal');
            }

            $this->resetForm();
            $this->alert('success', 'Type Created');
        } catch (\Exception $e) {
            $this->alert('error', $e->getMessage());
        }
    }

    public function confirmDelete($id)
    {
        $this->category_id = $id;
        $this->confirm('Apakah anda yakin ingin menghapus category ini?', [
            'icon' => 'warning',
            'position' => 'center',
            'toast' => false,
            'timer' => null,
            'text' => 'Jika ya, Klik tombol dibawah!',
            'cancel' => true,
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'onConfirmed' => 'delete',
            'confirmButtonText' => 'Yes, Delete it!',
            'confirmButtonColor' => '#d33',
            'cancelButtonColor' => '#3085d6'
        ]);
    }

    public function confirmDeleteType($id)
    {
        $this->type_id = $id;
        $this->confirm('Apakah anda yakin ingin menghapus type ini?', [
            'icon' => 'warning',
            'position' => 'center',
            'toast' => false,
            'timer' => null,
            'text' => 'Jika ya, Klik tombol dibawah!',
            'cancel' => true,
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'onConfirmed' => 'deleteType',
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

            redirect('/category');
        } catch (\Exception $e) {
            $this->alert('error', $e->getMessage());
        }
    }

    public function deleteType()
    {
        try {
            $type = TypeCourse::find($this->type_id);
            $type->delete();
            $this->alert('success', 'Type Deleted');

            redirect('/category');
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

    public function editType($id)
    {
        $this->type = TypeCourse::find($id);
        $this->name = $this->type->name;
        $this->type_id = $id;

        $this->dispatch('showEditTypeModal');
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

            redirect('/category');
        } catch (\Exception $e) {
            $this->alert('error', $e->getMessage());
        }
    }

    public function updateType()
    {
        $this->validate([
            'name' => 'required',
        ]);

        try {
            $this->type->update([
                'name' => $this->name,
            ]);

            $this->dispatch('closeEditTypeModal');
            $this->alert('success', 'Type Updated');
            redirect('/category');
        } catch (\Exception $e) {
            $this->alert('error', $e->getMessage());
        }
    }

    public function render()
    {
        $categories = CategoryCourse::when($this->search, function ($builder) {
            $builder->where('name', 'like', '%' . $this->search . '%');
        })->paginate(10);

        $types = TypeCourse::when($this->search, function ($builder) {
            $builder->where('name', 'like', '%' . $this->search . '%');
        })->paginate(10);

        return view('livewire.category.category-index', compact('categories', 'types'))->title(__('Category / Type'))->layout('layouts.app', ['breadcrumbData' => $this->breadcrumbData]);
    }
}
