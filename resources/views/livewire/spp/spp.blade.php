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
            <form wire:submit.prevent="add">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="nisn">Tahun</label>
                        <input type="text" wire:model.lazy="tahun" class="form-control round" placeholder="000009">
                        @error('tahun') 
                        <div class="alert alert-danger mt-1 alert-validation-msg" role="alert" style="display: block;">
                            <i class="feather icon-info mr-1 align-middle"></i>
                            <span class="error">{{ $message }}</span> 
                        </div>
                        @enderror
                        </div>                
                    </div>   

                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="nis">Nominal</label>
                        <input type="text" wire:model.lazy="nominal" class="form-control round" placeholder="000009">
                        @error('nominal') 
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
            <h2 class="card-header-title">Data SPP</h2>
            <div class="row align-items-center">                                
            </div>
        </div>
        <div class="card-body">
            <table class="table table-responsive-sm table-hover-animation table-hover">
                <thead class="primary">
                    <tr>
                    <th>#</th>
                    <th>Tahun</th>
                    <th>Nominal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($spps as $spp)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $spp->tahun }}</td>
                        <td>{{ $spp->nominal }}</td>
                        </tr>              
                    @endforeach                            
                </tbody>
                </table>
                {{ $spps->links() }}
        </div>
    </div>      
</div>
