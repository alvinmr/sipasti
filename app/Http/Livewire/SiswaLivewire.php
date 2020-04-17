<?php

namespace App\Http\Livewire;

use App\Siswa;
use App\Kelas;
use App\Spp;
use Livewire\Component;
use Livewire\WithPagination;

class SiswaLivewire extends Component
{
	use WithPagination;    

	public $nisn;
	public $nis;
	public $nama;
	public $kelas_id;
	public $alamat;
	public $no_tlp;
	public $spp_id;   
	
	public $judul_form = 'Tambah Siswa';
	public $button = 'add';
	public $block = true;

	public function add()
	{
		$validate = $this->validate([
			'nisn' => 'required',
			'nis' => 'required',
			'nama' => 'required',
			'kelas_id' => 'required',
			'alamat' => 'required',
			'no_tlp' => 'required',
			'spp_id'=> 'required',
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
		$siswa->kelas_id = $this->kelas_id;
		$siswa->alamat = $this->alamat;
		$siswa->no_tlp = $this->no_tlp;
		$siswa->spp_id = $this->spp_id;
		$siswa->save();
		session()->flash('message', 'Siswa berhasil diedit');
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
		$this->kelas_id = $siswa->kelas_id;
		$this->alamat = $siswa->alamat;
		$this->no_tlp = $siswa->no_tlp;
		$this->spp_id = $siswa->spp_id;
	}

	public function resetall()
	{
		$this->reset();
	}

	public function render()
	{
		return view('livewire.siswa.siswa',[
			'siswas' => Siswa::paginate(5),
			'kelas' => Kelas::all(),
			'spp' => Spp::all()
		]);
	}
}