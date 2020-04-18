<?php

namespace App\Http\Livewire\Admin;

use App\Kelas;
use Livewire\WithPagination;
use Livewire\Component;

class KelasLivewire extends Component
{
    use WithPagination;    

    public $kelas_id;
    public $nama_kelas;
    public $kompetensi_keahlian;

    public $judul_form = 'Tambah Kelas';
	public $button = 'add';
	public $block = true;
    
    public function add()
    {
        $validate = $this->validate([
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required'
        ]);
        $validate['nama_kelas'] = strtoupper($validate['nama_kelas']); 
        $validate['kompetensi_keahlian'] = ucwords($validate['kompetensi_keahlian']); 
        Kelas::create($validate);
        session()->flash('judul', 'Berhasil!');
        session()->flash('message', 'Kelas berhasil ditambah');
        session()->flash('jenis', 'success');
        return redirect()->route('admin.kelas');
    }

    public function edit($id)
    {
        $kelas = Kelas::find($id);
		$kelas->nama_kelas = strtoupper($this->nama_kelas);
        $kelas->kompetensi_keahlian = ucwords($this->kompetensi_keahlian);
		$kelas->save();
		session()->flash('judul', 'Berhasil!');
        session()->flash('message', 'Kelas berhasil diedit');
        session()->flash('jenis', 'success');
		return redirect()->route('admin.kelas');
    }

    public function showEdit($id)
	{
		$kelas = Kelas::find($id);
		$this->block = false;
		$this->judul_form = 'Edit Kelas';
		$this->button = 'edit';
        $this->kelas_id = $kelas->id;
		$this->nama_kelas = $kelas->nama_kelas;
        $this->kompetensi_keahlian = $kelas->kompetensi_keahlian;
    }
    
    public function delete($id)
    {   
        $kelas = Kelas::find($id);
        if( !$kelas->siswa ){            
            Kelas::destroy($id);
            session()->flash('judul', 'Berhasil!');
            session()->flash('message', 'Kelas berhasil dihapus');
            session()->flash('jenis', 'success');
            return redirect()->route('admin.kelas');
        }else{
            session()->flash('judul', 'Gagal!');
            session()->flash('message', 'Kelas memiliki relasi');
            session()->flash('jenis', 'error');
            return redirect()->route('admin.kelas');
        }        
    }

    public function resetall()
	{
		$this->reset();
	}

    public function render()
    {
        return view('livewire.admin.kelas',[
            'kelass' => Kelas::paginate(3)
        ]);
    }
}