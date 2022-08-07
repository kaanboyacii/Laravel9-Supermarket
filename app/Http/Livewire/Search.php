<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Search extends Component
{
    public $search = '';
    public function render()
    {
        $datalist = Product::where('title','like','%'.$this->search.'%')->get();
        return view('livewire.search',['datalist'=>$datalist,'query'=>$this->search]);
    }
}
