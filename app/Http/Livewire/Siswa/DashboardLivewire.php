<?php

namespace App\Http\Livewire\Siswa;

use Livewire\Component;
use App\TagihanSpp;

class DashboardLivewire extends Component
{
    public function render()
    {
        $this->siswa_id = auth()->user()->id;
        return view('livewire.siswa.dashboard-livewire',[
        
        ]);
    }
}