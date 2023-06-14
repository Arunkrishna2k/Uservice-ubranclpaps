<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;

class CategorySubCategory extends Component
{
    public $params;
    public $category;
    public $subCategory;

    public $selectedCategory = null;
    public $selectedSubCategory = null;
    public function mount()
    {
        $this->category = Category::all();
        $this->subCategory = collect();
        if(!is_null($this->params)){
            $this->selectedCategory = $this->params->category;
            $this->selectedSubCategory = $this->params->sub_category;
            $this->category = Category::where('category', $this->params->category)->get();
            $this->subCategory = SubCategory::where('sub_category', $this->params->sub_category)->get();
        }
    }
    public function render()
    {

        return view('livewire.category-sub-category');
    }


    public function updatedSelectedCategory($country)
    {
        $this->subCategory = SubCategory::where('category', $country)->get();
        $this->selectedSubCategory = NULL;
    }

}
