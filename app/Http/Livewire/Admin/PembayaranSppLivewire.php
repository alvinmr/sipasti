<?php

namespace App\Http\Livewire\Admin;

use Livewire\WithPagination;
use App\PembayaranSpp;
use App\Petugas;
use App\Siswa;
use Livewire\Component;

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


    public $judul_form = 'Tambah Pembayaran';
    public $button = 'add';
    public $block = true;
    public $bayar = false;

    public function updatedSiswaId($value)
    {
        $this->nominal = Siswa::find($value)->spp->nominal;
        $this->spp_id = Siswa::find($value)->spp->id;
    }
    public function add()
    {
        $validate = $this->validate([
            'petugas_id' => '',
            'siswa_id' => 'required',
            'tgl_bayar' => 'required',
            'bulan_dibayar' => 'required',
            'tahun_dibayar' => '',
            'spp_id' => 'required',
            'jumlah_bayar' => 'required'
        ]);
        $validate['petugas_id'] = auth()->user()->id;
        $validate['jumlah_bayar'] = 0;
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
        $pembayaran->jumlah_bayar = 0;
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
        $this->nominal = $pembayaran->siswa->spp->nominal;
        $this->status = $pembayaran->status;
        $this->bulan_dibayar = $pembayaran->bulan_dibayar;
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

    public function bayar($id)
    {
        $pembayaran = PembayaranSpp::find($id);
        $pembayaran->jumlah_bayar = str_replace('.', '', $this->jumlah_bayar);
        $pembayaran->petugas_id = auth()->user()->id;
        $pembayaran->save();
        session()->flash('judul', 'Berhasil!');
        session()->flash('message', 'Pembayaran berhasil!');
        session()->flash('jenis', 'success');
        return redirect()->route('admin.pembayaran-spp');
    }

    public function showBayar($id)
    {
        $pembayaran = PembayaranSpp::find($id);
        $this->block = false;
        $this->bayar = true;
        $this->judul_form = 'Pembayaran';
        $this->button = 'bayar';
        $this->pembayaran_id = $pembayaran->id;
        $this->petugas_id = $pembayaran->petugas_id;
        $this->siswa_id = $pembayaran->siswa_id;
        $this->tgl_bayar = $pembayaran->tgl_bayar;
        $this->jumlah_bayar = number_format($pembayaran->jumlah_bayar, 0, ",", ".");
        $this->nominal = $pembayaran->siswa->spp->nominal;
        $this->bulan_dibayar = $pembayaran->bulan_dibayar;
    }

    public function render()
    {
        return view('livewire.admin.pembayaran-spp-livewire', [
            'pembayaran_spps' => PembayaranSpp::paginate(5),
            'petugas' => Petugas::all(),
            'siswa' => Siswa::all()
        ]);
    }
}