<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\PembayaranSpp;

class HistorySppLivewire extends Component
{
    public function render()
    {
        return view('livewire.admin.history-spp-livewire',[
            'histories' => PembayaranSpp::paginate(5)
        ]);
    }
}