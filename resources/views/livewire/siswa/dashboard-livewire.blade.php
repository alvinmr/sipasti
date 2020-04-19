<div>
    <h2>Ini dashboard siswa</h2>
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
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>                   
                    @foreach ($tagihans as $tagihan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tagihan }}</td>
                        <td>{{ $tagihan }}</td>                        
                        <td>
                            <button wire:click="showEdit({{ $tagihan }})" class="btn btn-icon rounded-circle btn-warning mr-1 mb-1" id="editBtn{{ $loop->iteration }}">
                                <i class="feather icon-edit-2"></i>
                            </button>
                            <script>
                            $('#editBtn{{ $loop->iteration }}').click(function() {
                                $('html, body').animate({scrollTop: '0px'}, 300);                                                              
                            });
                            </script>     
                            <button wire:click="delete({{ $tagihan }})" class="btn btn-icon rounded-circle btn-danger mr-1 mb-1">
                                <i class="feather icon-trash"></i>
                            </button>                       
                        </td>
                    </tr>              
                    @endforeach                            
                </tbody>
                </table>
                {{-- {{ $tagihans->links() }} --}}
        </div>
    </div> 
</div>
