<?php

namespace App\Http\Livewire\Petugas;

use Livewire\Component;
use App\TagihanSpp;
use App\Siswa;

class TagihanSppLivewire extends Component
{
    public $tagihan_id, $siswa_id, $bulan, $spp_id, $nominal;
    
    public $judul_form = 'Tambah Tagihan SPP';
	public $button = 'add';
    public $block = true;
    
    public function updatedSiswaId($value)
    {
        $this->nominal = Siswa::find($value)->spp->nominal;
        $this->spp_id = Siswa::find($value)->spp->id;
    }

    public function add()
    {
        $validate = $this->validate([
            'siswa_id' => 'required',
            'bulan' => 'required'
        ]);
                
        TagihanSpp::create($validate);
        session()->flash('judul', 'Berhasil!');
        session()->flash('message', 'Tagihan berhasil ditambah');
        session()->flash('jenis', 'success');
        return redirect()->route('petugas.tagihan-spp');
    }

    public function render()
    {
        return view('livewire.petugas.tagihan-spp-livewire',[
            'tagihans' => TagihanSpp::paginate(5),
            'siswa' => Siswa::all()
        ]);
    }
}
