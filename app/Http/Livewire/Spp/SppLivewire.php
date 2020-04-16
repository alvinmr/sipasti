<?php

namespace App\Http\Livewire\Spp;

use App\SPP;
use Livewire\WithPagination;
use Livewire\Component;

class SppLivewire extends Component
{
    use WithPagination;    

    public $tahun;
    public $nominal;

    public function add()
    {
        $validate = $this->validate([
            'tahun' => 'required',
            'nominal' => 'required'
        ]);

        SPP::create($validate);
        session()->flash('message', 'SPP berhasil ditambah');
        return redirect()->route('spp');
    }

    public function render()
    {
        return view('livewire.spp.spp',[
            'spps' => SPPModel::paginate(3)
        ]);
    }
}