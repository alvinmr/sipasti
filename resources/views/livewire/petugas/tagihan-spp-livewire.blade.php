<div>
    <div class="card">
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
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label for="nisn">Bulan</label>
                        <select class="form-control round @error('bulan') is-invalid @enderror" id="bulan">
                            <option disabled {{ $tagihan_id == '' ? 'selected' : '' }} value="">Pilih Bulan</option>                        
                            <option wire:ignore.self value="Januari">Januari</option>                                            
                            <option wire:ignore.self value="Februari">Februari</option>                                            
                            <option wire:ignore.self value="Maret">Maret</option>                                            
                            <option wire:ignore.self value="April">April</option>                                            
                            <option wire:ignore.self value="Mei">Mei</option>                                            
                            <option wire:ignore.self value="Juni">Juni</option>                                            
                            <option wire:ignore.self value="Juli">Juli</option>                                            
                            <option wire:ignore.self value="Agustus">Agustus</option>                                            
                            <option wire:ignore.self value="September">September</option>                                            
                            <option wire:ignore.self value="Oktober">Oktober</option>                                            
                            <option wire:ignore.self value="November">November</option>                                            
                            <option wire:ignore.self value="Desember">Desember</option>                                                                
                        </select>                          
                        @error('bulan') 
                            <span class="invalid-feedback" role="alert">
                            <strong class="error">{{ $message }}</strong>
                        </span>                          
                        @enderror
                        </div>                
                    </div>   

                    <div class="col-lg-4">
                        <div class="form-group">
                        <label for="nis">Nama Siswa</label>
                        <select class="form-control round @error('siswa_id') is-invalid @enderror" id="nama">
                            <option disabled {{ $siswa_id == '' ? 'selected' : '' }} value="">Pilih Nama Siswa</option>
                        @foreach ($siswa as $s)
                            <option wire:ignore.self {{ $siswa_id == $s->id ? 'selected' : '' }} value="{{ $s->id }}">{{ $s->nama }}</option>                                            
                        @endforeach
                        </select>                         
                        @error('siswa_id') 
                            <span class="invalid-feedback" role="alert">
                            <strong class="error">{{ $message }}</strong>
                        </span>                                                 
                        @enderror
                        </div>
                    </div>      
                    <div class="col-lg-4">
                        <label for="nominal">Nominal SPP</label>
                        <h2>{{ "Rp ".number_format($nominal, 0, ",", ".") }} </h2>
                    </div>            
                </div>
                <button wire:click="add" class="mx-1 btn bg-gradient-primary round {{ $block == true ? 'd-inline' : 'd-none' }}"><i class="feather icon-send"></i> Tambah</button>            
                <button wire:click="edit({{ $tagihan_id }})" class="mx-1 btn bg-gradient-primary round {{ $block == true ? 'd-none' : 'd-inline' }}"><i class="feather icon-send"></i> Edit</button>            
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
            <h2 class="card-header-title">Data Kelas</h2>
            <div class="row align-items-center">                                
            </div>
        </div>
        <div class="card-body">
            <table class="table table-responsive-sm table-hover-animation">
                <thead class="primary">
                    <tr>
                        <th>#</th>
                        <th>Bulan</th>
                        <th>Siswa</th>
                        <th>Nominal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tagihans as $tagihan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tagihan->bulan }}</td>
                        <td>{{ $tagihan->siswa->nama }}</td>
                        <td>{{ "Rp " . number_format($tagihan->siswa->spp->nominal, 0, ",", ".") }}</td>
                        <td>
                            <button wire:click="showEdit({{ $tagihan->id }})" class="btn btn-icon rounded-circle btn-warning mr-1 mb-1" id="editBtn{{ $loop->iteration }}">
                                <i class="feather icon-edit-2"></i>
                            </button>
                            <script>
                            $('#editBtn{{ $loop->iteration }}').click(function() {
                                $('html, body').animate({scrollTop: '0px'}, 300);
                            });
                            </script>     
                            <button wire:click="delete({{ $tagihan->id }})" class="btn btn-icon rounded-circle btn-danger mr-1 mb-1">
                                <i class="feather icon-trash"></i>
                            </button>                       
                        </td>
                    </tr>              
                    @endforeach                            
                </tbody>
                </table>
                {{ $tagihans->links() }}
        </div>
    </div>      
</div>

<script>
    $(document).ready(function() {    
        $('#bulan').on('change', function (e) {
            @this.set('bulan', e.target.value);    
        });
        $('#nama').on('change', function (e) {
            @this.set('siswa_id', e.target.value);    
        });      
        
    });
</script>
