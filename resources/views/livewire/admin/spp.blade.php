<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah SPP</h4>
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
                        <label for="tahun">Tahun</label>
                        <input type="text" wire:model.lazy="tahun" class="form-control round @error('tahun') is-invalid @enderror" placeholder="000009">
                        @error('tahun') 
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>                
                    </div>   

                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="nis">Nominal</label>
                        <input type="text" wire:model.lazy="nominal" id="nominal" class="form-control round @error('nominal') is-invalid @enderror" placeholder="000009">
                        @error('nominal') 
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                    </div>                  
                </div>
                <button wire:click="add" class="mx-1 btn bg-gradient-primary round {{ $block == true ? 'd-inline' : 'd-none' }}"><i class="feather icon-send"></i> Tambah</button>            
                <button wire:click="edit({{ $spp_id }})" class="mx-1 btn bg-gradient-primary round {{ $block == true ? 'd-none' : 'd-inline' }}"><i class="feather icon-send"></i> Edit</button>            
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
            <h2 class="card-header-title">Data SPP</h2>
            <div class="row align-items-center">                                
            </div>
        </div>
        <div class="card-content">
            <table class="table mt-1 mb-0 table-responsive-sm table-hover-animation">
                <thead class="primary">
                    <tr>
                        <th>#</th>
                        <th>Tahun</th>
                        <th>Nominal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($spps as $spp)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $spp->tahun }}</td>
                        <td>{{ "Rp " . number_format($spp->nominal, 0, ",", ".") }}</td>
                        <td>
                            <button wire:click="showEdit({{ $spp->id }})" class="btn btn-icon rounded-circle btn-warning mr-1 mb-1" id="editBtn{{ $loop->iteration }}">
                                <i class="feather icon-edit-2"></i>
                            </button>
                            <script>
                            $('#editBtn{{ $loop->iteration }}').click(function() {
                                $('html, body').animate({scrollTop: '0px'}, 300);
                                $('#nominal').mask('000.000.000.000.000', {reverse: true});
                            });                           
                            </script>
                            <button wire:click="delete({{ $spp->id }})" class="btn btn-icon rounded-circle btn-danger mr-1 mb-1">
                                <i class="feather icon-trash"></i>
                            </button> 
                        </td>
                    </tr>              
                    @endforeach                            
                </tbody>
                </table>
                {{ $spps->links() }}
        </div>
    </div>      
</div>

<script>
    $(document).ready(function() {
        $('#nominal').mask('000.000.000.000.000', {reverse: true});
    })
</script>

