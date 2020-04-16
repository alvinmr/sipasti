<?php

namespace App\Http\Livewire;

use App\Siswa;
use Livewire\Component;
use Livewire\WithPagination;

class SiswaLivewire extends Component
{
	use WithPagination;    

	public $nisn;
	public $nis;
	public $nama;
	public $id_kelas;
	public $alamat;
	public $no_tlp;
	public $id_spp;   
	public $judul_form = 'Tambah Siswa';
	public $button = 'add';
	public $block = true;

	public function add()
	{
		$validate = $this->validate([
			'nisn' => 'required',
			'nis' => 'required',
			'nama' => 'required',
			'id_kelas' => 'required',
			'alamat' => 'required',
			'no_tlp' => 'required',
			'id_spp'=> 'required',
		]);

		Siswa::create($validate);
		session()->flash('message', 'Siswa berhasil ditambah');
		return redirect()->route('siswa');
		
	}

	public function delete($nisn)
	{
		Siswa::destroy($nisn);
		session()->flash('message', 'Siswa berhasil dihapus');
		return redirect()->route('siswa');
	}
	public function edit($nisn)
	{
		$siswa = Siswa::find($nisn);
		$siswa->nis = $this->nis;
		$siswa->nama = $this->nama;
		$siswa->id_kelas = $this->id_kelas;
		$siswa->alamat = $this->alamat;
		$siswa->no_tlp = $this->no_tlp;
		$siswa->id_spp = $this->id_spp;
		$siswa->save();
		return redirect()->route('siswa');
	}

	public function showEdit($nisn)
	{
		$siswa = Siswa::find($nisn);
		$this->block = false;
		$this->judul_form = 'Edit Siswa';
		$this->button = 'edit';
		$this->nisn = $siswa->nisn;
		$this->nis = $siswa->nis;
		$this->nama = $siswa->nama;
		$this->id_kelas = $siswa->id_kelas;
		$this->alamat = $siswa->alamat;
		$this->no_tlp = $siswa->no_tlp;
		$this->id_spp = $siswa->id_spp;
	}

	public function resetall()
	{
		$this->reset();
	}

	public function render()
	{
		return view('livewire.siswa-livewire',[
			'siswas' => Siswa::paginate(3)
		]);
	}
}