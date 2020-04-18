<?php

namespace App\Http\Livewire\Admin;

use App\Petugas;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class PetugasLivewire extends Component
{

    public $petugas_id;
    public $username;
    public $password;
    public $nama_petugas;
    public $level;

    public $judul_form = 'Tambah Petugas';
	public $button = 'add';
	public $block = true;

    public function add()
    {
        $validate = $this->validate([
            'username' => 'required',
            'password' => 'required',
            'nama_petugas' => 'required',
            'level' => 'required'
        ]);
        $validate['password'] = Hash::make($validate['password']); 
        Petugas::create($validate);
        session()->flash('judul', 'Berhasil!');
        session()->flash('message', 'Petugas berhasil ditambah');
        session()->flash('jenis', 'success');
        return redirect()->route('admin.petugas');
    }

    public function edit($id)
    {
        $petugas = Petugas::find($id);
		$petugas->username = $this->username;
        $petugas->password = $this->password;
        $petugas->nama_petugas = $this->nama_petugas;
        $petugas->level = $this->level;
		$petugas->save();
		session()->flash('judul', 'Berhasil!');
        session()->flash('message', 'Petugas berhasil diedit');
        session()->flash('jenis', 'success');
		return redirect()->route('admin.petugas');
    }

    public function showEdit($id)
	{
		$petugas = Petugas::find($id);
		$this->block = false;
		$this->judul_form = 'Edit Petugas';
		$this->button = 'edit';
        $this->petugas_id = $petugas->id;
        $this->username = $petugas->username;
        $this->password = $petugas->password;
		$this->nama_petugas = $petugas->nama_petugas;
        $this->level = $petugas->level;
    }

    public function delete($id)
    {   
        $petugas = Petugas::find($id);
        if( !$petugas->siswa ){            
            petugas::destroy($id);
            session()->flash('judul', 'Berhasil!');
            session()->flash('message', 'Petugas berhasil dihapus');
            session()->flash('jenis', 'success');
            return redirect()->route('admin.petugas');
        }else{
            session()->flash('judul', 'Gagal!');
            session()->flash('message', 'Petugas memiliki relasi');
            session()->flash('jenis', 'error');
            return redirect()->route('admin.petugas');
        }        
    }

    public function resetall()
	{
		$this->reset();
	}

    public function render()
    {
        return view('livewire.admin.petugas-livewire',[
            'petugass' => Petugas::paginate(5)
        ]);
    }
}