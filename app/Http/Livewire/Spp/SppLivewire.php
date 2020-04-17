<?php

namespace App\Http\Livewire\Spp;

use App\Spp;
use Livewire\WithPagination;
use Livewire\Component;

class SppLivewire extends Component
{
    use WithPagination;    

    public $spp_id;
    public $tahun;
    public $nominal;

    public $judul_form = 'Tambah SPP';
	public $button = 'add';
	public $block = true;

    public function add()
    {
        $validate = $this->validate([
            'tahun' => 'required',
            'nominal' => 'required'
        ]);

        SPP::create($validate);
        session()->flash('judul', 'Berhasil!');
        session()->flash('message', 'SPP berhasil ditambah');
        session()->flash('jenis', 'success');
    return redirect()->route('spp');
    }

    public function edit($id)
    {
        $spp = Spp::find($id);
		$spp->tahun = $this->tahun;
        $spp->nominal = $this->nominal;
		$spp->save();
        session()->flash('judul', 'Berhasil!');
        session()->flash('message', 'SPP berhasil diedit');
        session()->flash('jenis', 'success');
    return redirect()->route('spp');
    }

    public function showEdit($id)
	{
		$spp = Spp::find($id);
		$this->block = false;
		$this->judul_form = 'Edit Kelas';
		$this->button = 'edit';
        $this->spp_id = $spp->id;
		$this->nominal = $spp->nominal;
        $this->tahun = $spp->tahun;
    }

    public function delete($id)
    {   
        $spp = Spp::find($id);
        if( !$spp->siswa ){            
            SPP::destroy($id);
            session()->flash('judul', 'Berhasil!');
            session()->flash('message', 'SPP berhasil dihapus');
            session()->flash('jenis', 'success');
            return redirect()->route('spp');
        }else{
            session()->flash('judul', 'Gagal!');
            session()->flash('message', 'SPP memiliki relasi');
            session()->flash('jenis', 'error');
            return redirect()->route('spp');
        }        
    }

    public function render()
    {
        return view('livewire.spp.spp',[
            'spps' => Spp::paginate(3)
        ]);
    }
}