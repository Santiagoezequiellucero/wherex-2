<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryFilter extends Component
{   

    use WithPagination;

    public $category, $subcategoria, $marca;

    public function limpiar(){
        $this->reset(['subcategoria', 'marca']);
    }

    public function render()
    {
        $productsQuery = Product::query()->whereHas('subcategory.category', function(Builder $query){
            $query->where('id', $this->category->id);
        });

        if($this->subcategoria){
            $productsQuery = $productsQuery->whereHas('subcategory', function(Builder $query){
                $query->where('name', $this->subcategoria);
            });
        }

        $products = $productsQuery->paginate(20);

        return view('livewire.category-filter', compact('products'));
    }
}
