<?php

namespace App\Http\Livewire\Kelas;

use App\Kelas;
use Livewire\WithPagination;
use Livewire\Component;

class KelasLivewire extends Component
{
    use WithPagination;    


    public $nama_kelas;
    public $kompetensi_keahlian;
    
    public function add()
    {
        $validate = $this->validate([
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required'
        ]);
        $validate['nama_kelas'] = strtoupper($validate['nama_kelas']); 
        Kelas::create($validate);
        session()->flash('message', 'Kelas berhasil ditambah');
        return redirect()->route('kelas');
    }

    public function render()
    {
        return view('livewire.kelas.kelas',[
            'kelass' => Kelas::paginate(3)
        ]);
    }
}