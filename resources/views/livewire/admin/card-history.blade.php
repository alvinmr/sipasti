<div>     
    <div class="card mt-2">
        <div class="card-header">
            <h2 class="card-header-title">Data History Pembayaran</h2>
            <div class="row align-items-center">                                
            </div>
        </div>
        <div class="card-content">
            <table class="table mt-1 mb-0 table-responsive-sm table-hover-animation">
                <thead class="primary">
                    <tr>
                        <th>#</th>
                        <th>Nama Petugas</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Tanggal Bayar</th>
                        <th>Bulan</th>
                        <th>Angkatan Tahun</th>
                        <th>Nominal SPP</th>
                        <th>Jumlah Dibayar</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($histories as $history)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $history->petugas->nama_petugas }}</td>
                        <td>{{ $history->siswa->nis }}</td>                        
                        <td>{{ $history->siswa->nama }}</td>                        
                        <td>{{ $history->tgl_bayar }}</td>                        
                        <td>{{ $history->bulan_dibayar }}</td>                        
                        <td>{{ $history->tahun_dibayar }}</td>                        
                        <td>{{ "Rp " . number_format($history->siswa->spp->nominal, 0, ",", ".") }}</td>                       
                        <td>{{ "Rp " . number_format($history->jumlah_bayar, 0, ",", ".") }}</td>                                   
                        <td>
                            <span class="badge badge-pill {{ $history->siswa->spp->nominal <= $history->jumlah_bayar ? 'badge-success' : 'badge-danger' }}">
                                {{ $history->siswa->spp->nominal <= $history->jumlah_bayar ? 'Lunas' : 'Belum Lunas' }}
                            </span>
                        </td>                        
                    </tr>              
                    @endforeach                            
                </tbody>
                </table>
                {{ $histories->links() }}
        </div>
    </div>      
</div>
