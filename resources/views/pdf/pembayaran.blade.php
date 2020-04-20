<h1>Laporan Pembayaran</h1><br>
<h2>Tanggal : {{ date('Y-m-d') }}</h2>
<table border="1">
    <thead>
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
        </tr>
    </thead>
    <tbody>                   
        @foreach ($pembayaran_spps as $pembayaran)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $pembayaran->petugas->nama_petugas }}</td>
            <td>{{ $pembayaran->siswa->nis }}</td>
            <td>{{ $pembayaran->siswa->nama }}</td>
            <td>{{ $pembayaran->tgl_bayar }}</td>
            <td>{{ $pembayaran->bulan_dibayar }}</td>
            <td>{{ $pembayaran->tahun_dibayar }}</td>
            <td>{{ "Rp " . number_format($pembayaran->siswa->spp->nominal, 0, ",", ".") }}</td>                       
            <td>{{ "Rp " . number_format($pembayaran->jumlah_bayar, 0, ",", ".") }}</td>                                  
        </tr>              
        @endforeach  
        <tr>
            <td border="1px" colspan="8">Total Pembayaran:</td>                          
            <td border="1px">{{ "Rp " . number_format($total, 0, ",", ".") }}</td>                          
        </tr>
    </tbody>
</table>