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
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="nisn">Nama Kelas</label>
                        <input type="text" style="text-transform: uppercase;" wire:model.lazy="nama_kelas" class="form-control round" placeholder="000009">
                        @error('nama_kelas') 
                        <i class="feather icon-info mr-1 align-middle"></i>
                        <span class="error danger">{{ $message }}</span>  
                        @enderror
                        </div>                
                    </div>   

                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="nis">Kompetensi Keahlian</label>
                        <input type="text" style="text-transform: capitalize;" wire:model.lazy="kompetensi_keahlian" class="form-control round" placeholder="000009">
                        @error('kompetensi_keahlian') 
                        <i class="feather icon-info mr-1 align-middle"></i>
                        <span class="error danger">{{ $message }}</span>                         
                        @enderror
                        </div>
                    </div>                  
                </div>
                <button wire:click="add" class="mx-1 btn bg-gradient-primary round {{ $block == true ? 'd-inline' : 'd-none' }}"><i class="feather icon-send"></i> Tambah</button>            
                <button wire:click="edit({{ $kelas_id }})" class="mx-1 btn bg-gradient-primary round {{ $block == true ? 'd-none' : 'd-inline' }}"><i class="feather icon-send"></i> Edit</button>            
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
                        <th>Nama Kelas</th>
                        <th>Kompetensi Keahlian</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelass as $kelas)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kelas->nama_kelas }}</td>
                        <td>{{ $kelas->kompetensi_keahlian }}</td>
                        <td>
                            <button wire:click="showEdit({{ $kelas->id }})" class="btn btn-icon rounded-circle btn-warning mr-1 mb-1" id="editBtn{{ $loop->iteration }}">
                                <i class="feather icon-edit-2"></i>
                            </button>
                            <script>
                            $('#editBtn{{ $loop->iteration }}').click(function() {
                                $('html, body').animate({scrollTop: '0px'}, 300);
                            });
                            </script>     
                            <button wire:click="delete({{ $kelas->id }})" class="btn btn-icon rounded-circle btn-danger mr-1 mb-1">
                                <i class="feather icon-trash"></i>
                            </button>                       
                        </td>
                    </tr>              
                    @endforeach                            
                </tbody>
                </table>
                {{ $kelass->links() }}
        </div>
    </div>      
</div>
