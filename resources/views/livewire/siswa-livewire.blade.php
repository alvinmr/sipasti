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
            <div class="form-row">
              <div class="col-lg-3">
                <div class="form-group">
                  <label for="nisn">NISN</label>
                  <input type="text" {{ $block == true ? '' : 'disabled' }} wire:model.lazy="nisn" class="form-control round" id="nisn" placeholder="000009">
                  @error('nisn') 
                  <div class="alert alert-danger mt-1 alert-validation-msg" role="alert" style="display: block;">
                    <i class="feather icon-info mr-1 align-middle"></i>
                    <span class="error">{{ $message }}</span> 
                  </div>
                  @enderror
                </div>                
              </div>   

              <div class="col-lg-3">
                <div class="form-group">
                  <label for="nis">NIS</label>
                  <input type="text" wire:model.lazy="nis" class="form-control round" id="nis" placeholder="000009">
                  @error('nis') 
                  <div class="alert alert-danger mt-1 alert-validation-msg" role="alert" style="display: block;">
                    <i class="feather icon-info mr-1 align-middle"></i>
                    <span class="error">{{ $message }}</span> 
                  </div>
                  @enderror
                </div>
              </div>  

              <div class="col-lg-3">
                <div class="form-group">
                  <label for="nama">Nama Lengkap</label>
                  <input type="text" wire:model.lazy="nama" class="form-control round" id="nama" placeholder="000009">
                  @error('nama') 
                  <div class="alert alert-danger mt-1 alert-validation-msg" role="alert" style="display: block;">
                    <i class="feather icon-info mr-1 align-middle"></i>
                    <span class="error">{{ $message }}</span> 
                  </div>
                  @enderror
                </div>
              </div>    

              <div class="col-lg-3">
                <div class="form-group">
                  <label for="kelas">Kelas</label>
                  <input type="number" wire:model.lazy="id_kelas" class="form-control round" id="kelas" placeholder="000009">
                  @error('id_kelas')                         
                  <div class="alert alert-danger mt-1 alert-validation-msg" role="alert" style="display: block;">
                      <i class="feather icon-info mr-1 align-middle"></i>
                      <span class="error">{{ $message }}</span> 
                  </div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3">
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" wire:model.lazy="alamat" class="form-control round" id="alamat" placeholder="000009">
                  @error('alamat') 
                  <div class="alert alert-danger mt-1 alert-validation-msg" role="alert" style="display: block;">
                      <i class="feather icon-info mr-1 align-middle"></i>
                      <span class="error">{{ $message }}</span> 
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label for="no_tlp">No Telpon</label>
                  <input type="text" wire:model.lazy="no_tlp" class="form-control round" id="no_tlp" placeholder="000009">
                  @error('no_tlp') 
                  <div class="alert alert-danger mt-1 alert-validation-msg" role="alert" style="display: block;">
                    <i class="feather icon-info mr-1 align-middle"></i>
                    <span class="error">{{ $message }}</span> 
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="spp">SPP</label>
                  <input type="number" wire:model.lazy="id_spp" class="form-control round" id="spp" placeholder="000009">
                  @error('id_spp') 
                  <div class="alert alert-danger mt-1 alert-validation-msg" role="alert" style="display: block;">
                    <i class="feather icon-info mr-1 align-middle"></i>
                    <span class="error">{{ $message }}</span> 
                  </div>
                  @enderror
                </div>   
              </div>
            </div>            
            <button wire:click="add" class="mx-1 btn bg-gradient-primary round {{ $block == true ? 'd-inline' : 'd-none' }}"><i class="feather icon-send"></i> Tambah</button>            
            <button wire:click="edit({{ $nisn }})" class="mx-1 btn bg-gradient-primary round {{ $block == true ? 'd-none' : 'd-inline' }}"><i class="feather icon-send"></i> Edit</button>            
            <button wire:click="resetall" class="btn btn-flat-danger round {{ $block == false ? '' : 'd-none' }}"><i class="feather icon-x"></i> Cancel</button>            
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
          <h2 class="card-header-title">Data Siswa</h2>
          <div class="row align-items-center">                                
          </div>
      </div>
      <div class="card-body">
          <table class="table table-responsive-sm table-hover-animation table-hover">
            <thead class="primary">
                <tr>
                  <th>#</th>
                  <th>NISN</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Alamat</th>
                  <th>No Telpon</th>
                  <th>SPP</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($siswas as $siswa)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $siswa->nisn }}</td>
                      <td>{{ $siswa->nis }}</td>
                      <td>{{ $siswa->nama }}</td>
                      <td>{{ $siswa}}</td>
                      <td>{{ $siswa->alamat }}</td>
                      <td>{{ $siswa->no_tlp }}</td>
                      <td>{{ $siswa->id_spp }}</td>
                      <td>
                        <button wire:click="showEdit({{ $siswa->nisn }})" class="btn btn-icon rounded-circle btn-warning mr-1 mb-1">
                          <i class="feather icon-edit-2"></i>
                        </button>
                        <button wire:click="delete({{ $siswa->nisn }})" class="btn btn-icon rounded-circle btn-danger mr-1 mb-1">
                          <i class="feather icon-trash"></i>
                        </button>
                      </td>
                    </tr>              
                  @endforeach                            
              </tbody>
            </table>
            {{ $siswas->links() }}
      </div>
    </div>
  </div>
</div>

