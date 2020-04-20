<div>
    {{-- Do your work, then step back. --}}
    <section id="dashboard-analytics">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card bg-dark text-white">
                    <div class="card-content">
                        <div class="card-body text-center">
                            <img src="{{ asset('') }}app-assets/images/elements/decore-left.png" class="img-left" alt=" card-img-left">
                            <img src="{{ asset('') }}app-assets/images/elements/decore-right.png" class="img-right" alt=" card-img-right">
                            <div class="avatar avatar-xl bg-primary shadow mt-0">
                                <div class="avatar-content">
                                    <i class="feather icon-award white font-large-1"></i>
                                </div>
                            </div>
                            <div class="text-center">
                                <h1 class="mb-2 text-white">Selamat Datang {{ auth()->user()->nama_petugas }},</h1>
                                <p class="m-auto w-75">Yuk mari bekerja dari <strong>rumah</strong> mulai dari sekarang. Agar menyelamatkan banyak nyawa orang!</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>                        
        </div>                            
    </section>
</div>
@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/core/colors/palette-gradient.css">
<link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/pages/dashboard-analytics.css">    
@endsection
