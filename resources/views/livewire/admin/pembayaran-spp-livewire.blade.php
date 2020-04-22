<div>
    {{-- Start card tambah dan edit --}}
    <div class="card {{ $bayar == true ? 'd-none' : 'd-block' }}">
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
                    <div class="col-lg-3 {{ $block == false ? 'd-block' : 'd-none' }}">
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

                    <div class="col-lg-3">
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
                    
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="petugas">Tanggal Bayar</label> 
                            <input  type="date" value="{{ $tgl_bayar }}" class="form-control pickadate round @error('tgl_bayar') is-invalid @enderror" placeholder="" id="tgl_bayar">
                            @error('tgl_bayar')                         
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>              
                    </div> 

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="petugas">Bulan</label> 
                            <input type="text" wire:model.lazy="bulan_dibayar" class="form-control round @error('bulan_dibayar') is-invalid @enderror" placeholder="" id="bulan">
                            @error('bulan_dibayar')                         
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>              
                    </div> 
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="petugas">Nominal</label> 
                            <h2>{{ "Rp " . number_format($nominal, 0, ",", ".") }}</h2>                            
                        </div>              
                    </div>                     
                </div>   
                <button wire:click="add" class="mx-1 btn bg-gradient-primary round {{ $block == true ? 'd-inline' : 'd-none' }}"><i class="feather icon-send"></i> Tambah</button>            
                <button wire:click="edit({{ $pembayaran_id }})" class="mx-1 btn bg-gradient-primary round {{ $block == true ? 'd-none' : 'd-inline' }}"><i class="feather icon-send"></i> Edit</button>            
                <button wire:click="resetall" class="btn btn-flat-danger round {{ $block == false ? '' : 'd-none' }}"><i class="feather icon-x"></i> Cancel</button>                            
            </div>
        </div>
    </div>
    {{-- Start Card Bayar --}}
    <div class="card {{ $bayar == true ? 'd-block' : 'd-none' }}">
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
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="petugas">Nama Petugas</label> 
                            <select disabled class="form-control select2 round @error('petugas_id') is-invalid @enderror" id="nama_petugas">                                
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

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="siswa">Nama Siswa</label> 
                            <select disabled class="form-control round @error('siswa_id') is-invalid @enderror" id="nama_siswa">                                
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
                    
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="petugas">Tanggal Bayar</label> 
                            <h2>{{ $tgl_bayar }}</h2>
                            @error('tgl_bayar')                         
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>              
                    </div> 

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="petugas">Bulan</label> 
                            <h2>{{ $bulan_dibayar }}</h2>
                            @error('bulan_dibayar')                         
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>              
                    </div> 
                </div>

                <div class="row">
                    <div class="col-lg-3">
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
                            <input type="text" wire:model="jumlah_bayar" class="form-control round @error('jumlah_bayar') is-invalid @enderror" placeholder="" id="edit_jumlah">
                            @error('jumlah_bayar')                         
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> 
                            @enderror
                        </div>              
                    </div> 
                </div>
                <button wire:click="add" class="mx-1 btn bg-gradient-primary round {{ $block == true ? 'd-inline' : 'd-none' }}"><i class="feather icon-send"></i> Tambah</button>            
                <button wire:click="{{ $button }}({{ $pembayaran_id }})" class="mx-1 btn bg-gradient-primary round {{ $block == true ? 'd-none' : 'd-inline' }}"><i class="feather icon-send"></i> Edit</button>            
                <button wire:click="resetall" class="btn btn-flat-danger round {{ $block == false ? '' : 'd-none' }}"><i class="feather icon-x"></i> Cancel</button>                            
            </div>
        </div>
    </div>
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
                        <td>{{ "Rp " . number_format($pembayaran->jumlah_bayar, 0, ",", ".") }}</td>                       
                        <td>
                            <button wire:click="showBayar({{ $pembayaran->id }})" class="btn round btn-success mr-1 mb-1">
                                Bayar
                            </button>
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
        $('#edit_jumlah').mask('000.000.000.000.000', {reverse: true});              
        
        
    });
</script>
