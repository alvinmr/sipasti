<?php

namespace App\Http\Livewire\Siswa;

use Livewire\Component;
use App\PembayaranSpp;

class HistorySppLivewire extends Component
{
    public function render()
    {
        return view('livewire.siswa.history-spp-livewire',[
            'histories' => PembayaranSpp::where('siswa_id', auth()->user()->id)->paginate(5)
        ]);
    }
}