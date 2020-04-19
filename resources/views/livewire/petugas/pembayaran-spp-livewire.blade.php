<div>
    {{-- <div class="card">
        <div class="card-header pb-2">
            <h4 class="card-title">{{ $judul_form }}</h4>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>                
                    <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="card-content collapse show" aria-expanded="true">
            <div class="card-body">            
                <div class="row">                      
                    <div class="{{ $block == true ? 'col-3' : 'col-4' }}">
                        <div class="form-group">
                            <label for="petugas">Nama Petugas</label> 
                            <select class="form-control select2 round @error('petugas_id') is-invalid @enderror" id="nama_petugas">
                                <option disabled {{ $petugas_id == '' ? 'selected' : '' }} value="">Pilih Nama Petugas</option>
                            @foreach ($petugas as $p)
                                <option wire:ignore.self {{ $petugas_id == $p->id ? 'selected' : '' }} value="{{ $p->id }}">{{ $p->nama_petugas }}</option>                                            
                            @endforeach
                            </select>               
                            @error('petugas_id')                         
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>              
                    </div>   

                    <div class="{{ $block == true ? 'col-3' : 'col-4' }}">
                        <div class="form-group">
                            <label for="siswa">Nama Siswa</label> 
                            <select class="form-control round @error('siswa_id') is-invalid @enderror" id="nama_siswa">
                                <option disabled {{ $siswa_id == '' ? 'selected' : '' }} value="">Pilih Nama Siswa</option>
                            @foreach ($siswa as $s)
                                <option wire:ignore.self {{ $siswa_id == $s->id ? 'selected' : '' }} value="{{ $s->id }}">{{ $s->nama }}</option>                                            
                            @endforeach
                            </select>               
                            @error('siswa_id')                         
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>              
                    </div>  
                    
                    <div wire:ignore class="{{ $block == true ? 'col-3' : 'col-4' }}">
                        <div class="form-group">
                            <label for="petugas">Tanggal Bayar</label> 
                            <input  type="date" value="{{ $tgl_bayar }}" class="form-control pickadate round @error('tgl_bayar') is-invalid @enderror" placeholder="..." id="tgl_bayar">
                            @error('tgl_bayar')                         
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>              
                    </div> 

                    <div class="col-lg-3 {{ $block == true ? '' : 'd-none' }}">
                        <div class="form-group">
                            <label for="petugas">Nominal</label> 
                            <h2>{{ "Rp " . number_format($nominal, 0, ",", ".") }}</h2>                            
                        </div>              
                    </div>                     
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="petugas">Jumlah Pembayaran</label> 
                            <input type="text" wire:model.lazy="jumlah_bayar" class="form-control round @error('jumlah_bayar') is-invalid @enderror" placeholder="000009" id="jumlah_bayar">
                            @error('jumlah_bayar')                         
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> 
                            @enderror
                        </div>              
                    </div> 
                </div>
                {{ $tgl_bayar }}
                <button wire:click="add" class="mx-1 btn bg-gradient-primary round {{ $block == true ? 'd-inline' : 'd-none' }}"><i class="feather icon-send"></i> Tambah</button>            
                <button wire:click="edit({{ $pembayaran_id }})" class="mx-1 btn bg-gradient-primary round {{ $block == true ? 'd-none' : 'd-inline' }}"><i class="feather icon-send"></i> Edit</button>            
                <button wire:click="resetall" class="btn btn-flat-danger round {{ $block == false ? '' : 'd-none' }}"><i class="feather icon-x"></i> Cancel</button>                            
            </div>
        </div>
    </div> --}}
    @if (session()->has('message'))
    <script>
        Swal.fire({
        title: '{{ session("judul") }}!',
        text: '{{ session("message") }}',
        type: '{{ session("jenis") }}',
        confirmButtonText: 'Oke'
        })
    </script>
    @endif
    <div class="card mt-2">
        <div class="card-header">
            <h2 class="card-header-title">Data Pembayaran SPP</h2>
            <div class="row align-items-center">                                
            </div>
        </div>
        <div class="card-body">
            <table class="table table-responsive-sm table-hover-animation">
                <thead class="primary">
                    <tr>
                        <th>#</th>
                        <th>Nama Petugas</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Tanggal Bayar</th>
                        <th>Bulan</th>
                        <th>Angkatan Tahun</th>
                        <th>Nominal Bayar</th>
                        <th>Status</th>
                        <th></th>
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
                        <td>
                            <div class="badge badge-pill {{ $pembayaran->status == 'Lunas' ? 'badge-success' : 'badge-danger' }} badge-md">
                                {{ $pembayaran->status }}
                            </div>
                        </td>
                        <td>
                            <button wire:click="showEdit({{ $pembayaran->id }})" class="btn btn-icon rounded-circle btn-warning mr-1 mb-1" id="editBtn{{ $loop->iteration }}">
                                <i class="feather icon-edit-2"></i>
                            </button>
                            <script>
                            $('#editBtn{{ $loop->iteration }}').click(function() {
                                $('html, body').animate({scrollTop: '0px'}, 300);                                                              
                            });
                            </script>     
                            <button wire:click="delete({{ $pembayaran->id }})" class="btn btn-icon rounded-circle btn-danger mr-1 mb-1">
                                <i class="feather icon-trash"></i>
                            </button>                       
                        </td>
                    </tr>              
                    @endforeach                            
                </tbody>
                </table>
                {{ $pembayaran_spps->links() }}
        </div>
    </div>      
</div>

<script>
    $(document).ready(function() {    
        $('#nama_siswa').on('change', function (e) {
            @this.set('siswa_id', e.target.value);    
        });     
        $('#nama_petugas').on('change', function (e) {
            @this.set('petugas_id', e.target.value);
        });        
        $('#tgl_bayar').on('change', function(e){
            @this.set('tgl_bayar', e.target.value);
        });       
        $('#jumlah_bayar').mask('000.000.000.000.000', {reverse: true});              
        
        
    });
</script>
