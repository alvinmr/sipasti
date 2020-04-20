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
                    <div class="col-lg-3">
                        <div class="form-group">
                        <label for="nisn">Username</label>
                        <input type="text" wire:model.lazy="username" class="form-control round" placeholder="">
                        @error('username') 
                        <i class="feather icon-info mr-1 align-middle"></i>
                        <span class="error danger">{{ $message }}</span>  
                        @enderror
                        </div>                
                    </div>   
                    <div class="col-lg-3 {{ $block == true ? '' : 'd-none' }}">
                        <div class="form-group">
                        <label for="nisn">Password</label>
                        <input type="password" wire:model.lazy="password" class="form-control round" placeholder="">
                        @error('password') 
                        <i class="feather icon-info mr-1 align-middle"></i>
                        <span class="error danger">{{ $message }}</span>  
                        @enderror
                        </div>                
                    </div>   
                    <div class="col-lg-3">
                        <div class="form-group">
                        <label for="nisn">Nama petugas</label>
                        <input type="text" wire:model.lazy="nama_petugas" class="form-control round" placeholder="">
                        @error('nama_petugas') 
                        <i class="feather icon-info mr-1 align-middle"></i>
                        <span class="error danger">{{ $message }}</span>  
                        @enderror
                        </div>                
                    </div>   

                    <div class="col-lg-3">
                        <div class="form-group">
                        <label for="nis">Level</label>
                        <select class="form-control round" id="level">
                            <option disabled {{ $level == '' ? 'selected' : '' }} value="">Pilih Level</option>
                            <option wire:ignore.self {{ $level == 'admin' ? 'selected' : '' }} value="admin">Admin</option>                                            
                            <option wire:ignore.self {{ $level == 'petugas' ? 'selected' : '' }} value="petugas">Petugas</option>                                            
                        </select> 
                        @error('level') 
                        <i class="feather icon-info mr-1 align-middle"></i>
                        <span class="error danger">{{ $message }}</span>                         
                        @enderror
                        </div>
                    </div>                  
                </div>
                <button wire:click="add" class="mx-1 btn bg-gradient-primary round {{ $block == true ? 'd-inline' : 'd-none' }}"><i class="feather icon-send"></i> Tambah</button>            
                <button wire:click="edit({{ $petugas_id }})" class="mx-1 btn bg-gradient-primary round {{ $block == true ? 'd-none' : 'd-inline' }}"><i class="feather icon-send"></i> Edit</button>            
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
            <h2 class="card-header-title">Data petugas</h2>
            <div class="row align-items-center">                                
            </div>
        </div>
        <div class="card-content">
            <table class="table mt-1 mb-0 table-responsive-sm table-hover-animation">
                <thead class="primary">
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Nama Petugas</th>
                        <th>Level</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($petugass as $petugas)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $petugas->username }}</td>
                        <td>{{ $petugas->nama_petugas }}</td>
                        <td>{{ $petugas->level }}</td>
                        <td>
                            <button wire:click="showEdit({{ $petugas->id }})" class="btn btn-icon rounded-circle btn-warning mr-1 mb-1" id="editBtn{{ $loop->iteration }}">
                                <i class="feather icon-edit-2"></i>
                            </button>
                            <script>
                            $('#editBtn{{ $loop->iteration }}').click(function() {
                                $('html, body').animate({scrollTop: '0px'}, 300);
                            });
                            </script>     
                            <button wire:click="delete({{ $petugas->id }})" class="btn btn-icon rounded-circle btn-danger mr-1 mb-1">
                                <i class="feather icon-trash"></i>
                            </button>                       
                        </td>
                    </tr>              
                    @endforeach                            
                </tbody>
                </table>
                {{ $petugass->links() }}
        </div>
    </div>      
</div>

<script>
    $(document).ready(function() {    
        $('#level').on('change', function (e) {
            @this.set('level', e.target.value);    
        });   
        
    });
</script>
