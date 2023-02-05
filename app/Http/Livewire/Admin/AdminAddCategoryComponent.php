<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminAddCategoryComponent extends Component
{
    public $name;

    public $slug;

    public function render()
    {
//        return view('livewire.admin.admin-add-category-component');
    }

    public function generateSlug()
    {
//        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
//        $this->validateOnly($fields, [
//            'name' => 'required',
//            'slug' => 'required|unique:categories',
//        ]);
    }

    protected $rules = [
        'name' => 'required|min:6',
        'slug' => 'required|unique:categories',
    ];

    public function addCategory()
    {
//        $this->validate($this->rules);
//
//        Category::create([
//            'name' => $this->name,
//            'slug' => $this->slug,
//        ]);
//
//        return redirect('/admin/categories')->with('message', 'Category successfully added.');
    }
}
