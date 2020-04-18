<?php

namespace App\Http\Livewire\Admin;

use Livewire\WithPagination;
use App\PembayaranSpp;
use App\Siswa;
use App\Petugas;
use Livewire\Component;
Use \Carbon\Carbon;

class PembayaranSppLivewire extends Component
{
    use WithPagination;    

    public $pembayaran_id;
    public $petugas_id;
    public $siswa_id;
    public $tgl_bayar;
    public $bulan_dibayar;
    public $tahun_dibayar;
    public $spp_id;
    public $jumlah_bayar;
    public $nominal;
    public $status;
    

    public $judul_form = 'Tambah Pembayaran';
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
            'petugas_id' => 'required',
            'siswa_id' => 'required',
            'tgl_bayar' => 'required',
            'bulan_dibayar' => '',
            'tahun_dibayar' => '',
            'spp_id' => 'required',
            'jumlah_bayar' => 'required',
            'status' => ''
        ]);
        
        $validate['bulan_dibayar'] = date('F'); 
        $validate['tahun_dibayar'] = date('Y');
        if($validate['jumlah_bayar'] <= $this->nominal){
            $validate['status'] = 'Belum Lunas';
        }else{
            $validate['status'] = 'Lunas';
        }
        PembayaranSpp::create($validate);
        session()->flash('judul', 'Berhasil!');
        session()->flash('message', 'Pembayaran berhasil ditambah');
        session()->flash('jenis', 'success');
        return redirect()->route('admin.pembayaran-spp');
    }

    public function edit($id)
    {
        $pembayaran = PembayaranSpp::find($id);
		$pembayaran->petugas_id = $this->petugas_id;
        $pembayaran->siswa_id = $this->siswa_id;
        $pembayaran->tgl_bayar = $this->tgl_bayar;
        $pembayaran->jumlah_bayar = $this->jumlah_bayar;
        if($pembayaran->jumlah_bayar <= $this->nominal){
            $pembayaran->status = "Belom Lunas";
        }else{
            $pembayaran->status = "Lunas";
        }
		$pembayaran->save();
		session()->flash('judul', 'Berhasil!');
        session()->flash('message', 'Pembayaran berhasil diedit');
        session()->flash('jenis', 'success');
		return redirect()->route('admin.pembayaran-spp');
    }

    public function showEdit($id)
	{
		$pembayaran = PembayaranSpp::find($id);
		$this->block = false;
		$this->judul_form = 'Edit Pembayaran';
		$this->button = 'edit';
        $this->pembayaran_id = $pembayaran->id;
        $this->petugas_id = $pembayaran->petugas_id;
		$this->siswa_id = $pembayaran->siswa_id;
		$this->tgl_bayar = $pembayaran->tgl_bayar;
        $this->jumlah_bayar = $pembayaran->jumlah_bayar;
        $this->nominal = $pembayaran->siswa->spp->nominal;
    }

    public function delete($id)
    {   
        $pembayaran = PembayaranSpp::find($id);                
        PembayaranSpp::destroy($id);
        session()->flash('judul', 'Berhasil!');
        session()->flash('message', 'Pembayaran berhasil dihapus');
        session()->flash('jenis', 'success');   
        return redirect()->route('admin.pembayaran-spp');
    }

    public function resetall()
	{
		$this->reset();
	}
    
    public function render()
    {
        return view('livewire.admin.pembayaran-spp-livewire',[
            'pembayaran_spps' => PembayaranSpp::paginate(5),
            'siswa' => Siswa::all(),
            'petugas' => Petugas::all()
        ]);
    }
}