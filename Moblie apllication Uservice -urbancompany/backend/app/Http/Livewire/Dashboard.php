<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Order;
use Livewire\Component;

class Dashboard extends Component
{

    private $category;
    private $subCategory;
    private $product;
    private $order;

    public function mount()
    {
        $this->category = Category::get();
        $this->category = $this->category->count();
        $this->subCategory = SubCategory::get();
        $this->subCategory = $this->subCategory->count();
        $this->product = Product::get();
        $this->product = $this->product->count();
        $this->order = Order::get();
        $this->order = $this->order->count();
    }

    public function render()
    {
        return view('livewire.dashboard', [
            'category' => $this->category,
            'subCategory' => $this->subCategory,
            'product' => $this->product,
            'order' => $this->order,
        ]);
    }
}
