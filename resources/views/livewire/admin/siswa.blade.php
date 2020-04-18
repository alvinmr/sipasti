<div>
  <div class="card" id="form">
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
                  <i class="feather icon-info mr-1 align-middle"></i>
                        <span class="error danger">{{ $message }}</span>  
                  @enderror
                </div>                
              </div>   

              <div class="col-lg-3">
                <div class="form-group">
                  <label for="nis">NIS</label>
                  <input type="text" wire:model.lazy="nis" class="form-control round" id="nis" placeholder="000009">
                  @error('nis') 
                  <i class="feather icon-info mr-1 align-middle"></i>
                        <span class="error danger">{{ $message }}</span>  
                  @enderror
                </div>
              </div>  

              <div class="col-lg-4">
                <div class="form-group">
                  <label for="nama">Nama Lengkap</label>
                  <input type="text" wire:model.lazy="nama" class="form-control round" id="nama" placeholder="000009">
                  @error('nama') 
                  <i class="feather icon-info mr-1 align-middle"></i>
                        <span class="error danger">{{ $message }}</span>  
                  @enderror
                </div>
              </div>    

              <div class="col-lg-2">
                <div class="form-group">
                  <label for="kelas">Kelas</label> 
                  <select class="form-control select2 round" id="kelas">
                      <option disabled {{ $kelas_id == '' ? 'selected' : '' }} value="">Pilih Kelas</option>
                    @foreach ($kelas as $k)
                      <option wire:ignore.self {{ $kelas_id == $k->id ? 'selected' : '' }} value="{{ $k->id }}">{{ $k->nama_kelas }}</option>                                            
                    @endforeach
                  </select>               
                  @error('kelas_id')                         
                  <i class="feather icon-info mr-1 align-middle"></i>
                        <span class="error danger">{{ $message }}</span>  
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" wire:model.lazy="alamat" class="form-control round" id="alamat" placeholder="000009">
                  @error('alamat') 
                  <i class="feather icon-info mr-1 align-middle"></i>
                        <span class="error danger">{{ $message }}</span>  
                  @enderror
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label for="no_tlp">No Telpon</label>
                  <input type="text" wire:model.lazy="no_tlp" class="form-control round" id="no_tlp" placeholder="000009">
                  @error('no_tlp') 
                  <i class="feather icon-info mr-1 align-middle"></i>
                  <span class="error danger">{{ $message }}</span>  
                  @enderror
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label for="kelas">SPP</label> 
                  <select class="form-control round" id="spp">
                      <option disabled {{ $spp_id == '' ? 'selected' : '' }} value="">Pilih SPP</option>
                    @foreach ($spp as $s)
                      <option wire:ignore.self {{ $spp_id == $s->id ? 'selected' : '' }} value="{{ $s->id }}">{{ "Rp ".number_format($s->nominal, 0, ",", ".") }}</option>                                            
                    @endforeach
                  </select>               
                  @error('spp_id')                         
                  <i class="feather icon-info mr-1 align-middle"></i>
                  <span class="error danger">{{ $message }}</span>  
                  @enderror
                </div>
              </div>
            </div>            
            <button wire:click="add" class="mx-1 btn bg-gradient-primary round {{ $block == true ? 'd-inline' : 'd-none' }}"><i class="feather icon-send"></i> Tambah</button>            
            <button wire:click="edit({{ $siswa_id }})" class="mx-1 btn bg-gradient-primary round {{ $block == true ? 'd-none' : 'd-inline' }}"><i class="feather icon-send"></i> Edit</button>            
            <button wire:click="resetall" class="btn btn-flat-danger round {{ $block == false ? '' : 'd-none' }}"><i class="feather icon-x"></i> Cancel</button>            
        </div>
    </div>
</div>
  @if (session()->has('message'))
  <script>
    Swal.fire({
      title: 'Berhasil!',
      text: '{{ session("message") }}',
      type: 'success',
      confirmButtonText: 'Oke'
    })
  </script>
  @endif
  <div class="card mt-2">
      <div class="card-header">
          <h2 class="card-header-title">Data Siswa</h2>
          <div class="row align-items-center">                                
          </div>
      </div>
      <div class="card-body">
          <table class="table table-responsive-sm table-hover-animation table-inverse">
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
                      <td>{{ $siswa->kelas->nama_kelas }}</td>
                      <td>{{ $siswa->alamat }}</td>
                      <td>{{ $siswa->no_tlp }}</td>
                      <td>{{ "Rp " .number_format($siswa->spp->nominal, 0, ",", ".") }}</td>
                      <td>
                        <button wire:click="showEdit({{ $siswa->id }})" class="btn btn-icon rounded-circle btn-warning mr-1 mb-1" id="editBtn{{ $loop->iteration }}">
                          <i class="feather icon-edit-2"></i>
                        </button>
                        <script>
                          $('#editBtn{{ $loop->iteration }}').click(function() {
                            $('html, body').animate({scrollTop: '0px'}, 300);
                          });
                        </script>
                        <button wire:click="delete({{ $siswa->id }})" class="btn btn-icon rounded-circle btn-danger mr-1 mb-1">
                          <i class="feather icon-trash"></i>
                        </button>
                        {{-- <script>
                          $('#edit').on('click', function(e){
                              @this.set('kelas_id', {{ $siswa->nisn }})
                          });
                        </script> --}}
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


<script>
  $(document).ready(function() {    
      $('#kelas').on('change', function (e) {
          @this.set('kelas_id', e.target.value);    
      });
      $('#spp').on('change', function (e) {
          @this.set('spp_id', e.target.value);    
      });      
      
  });
</script>

