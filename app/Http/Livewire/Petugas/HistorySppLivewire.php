<?php

namespace App\Http\Livewire\Petugas;

use Livewire\Component;
use App\PembayaranSpp;

class HistorySppLivewire extends Component
{
    public function render()
    {
        return view('livewire.petugas.history-spp-livewire',[
            'histories' => PembayaranSpp::paginate(5)
        ]);
    }
}