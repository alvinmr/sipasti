<div>
    <div class="card">
        <div class="card-header pb-2">
            <h4 class="card-title">Tambah Kelas</h4>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>                
                    <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="card-content collapse show" aria-expanded="true">
            <div class="card-body">
            <form wire:submit.prevent="add">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="nisn">Nama Kelas</label>
                        <input type="text" style="text-transform: uppercase;" wire:model.lazy="nama_kelas" class="form-control round" id="nisn" placeholder="000009">
                        @error('nisn') 
                        <div class="alert alert-danger mt-1 alert-validation-msg" role="alert" style="display: block;">
                            <i class="feather icon-info mr-1 align-middle"></i>
                            <span class="error">{{ $message }}</span> 
                        </div>
                        @enderror
                        </div>                
                    </div>   

                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="nis">Kompetensi Keahlian</label>
                        <input type="text" wire:model.lazy="kompetensi_keahlian" class="form-control round" id="nis" placeholder="000009">
                        @error('nis') 
                        <div class="alert alert-danger mt-1 alert-validation-msg" role="alert" style="display: block;">
                            <i class="feather icon-info mr-1 align-middle"></i>
                            <span class="error">{{ $message }}</span> 
                        </div>
                        @enderror
                        </div>
                    </div>                  
                </div>
                <button type="submit" class="btn bg-gradient-primary round"><i class="feather icon-send"></i> Submit</button>
            </form>
            </div>
        </div>
    </div>
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="card mt-2">
        <div class="card-header">
            <h2 class="card-header-title">Data Kelas</h2>
            <div class="row align-items-center">                                
            </div>
        </div>
        <div class="card-body">
            <table class="table table-responsive-sm table-hover-animation table-hover">
                <thead class="primary">
                    <tr>
                    <th>#</th>
                    <th>Nama Kelas</th>
                    <th>Kompetensi Keahlian</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelass as $kelas)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kelas->nama_kelas }}</td>
                        <td>{{ $kelas->kompetensi_keahlian }}</td>
                        </tr>              
                    @endforeach                            
                </tbody>
                </table>
                {{ $kelass->links() }}
        </div>
    </div>      
</div>
