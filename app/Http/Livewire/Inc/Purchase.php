<?php

namespace App\Http\Livewire\Inc;

use Livewire\Component;

class Purchase extends Component
{
    public $name;
    public function mount(){

    }
    public function test(){
        dd($this->name);
    }
    public function render()
    {
        return view('livewire.inc.purchase');
    }
}
