@extends('layouts.app')

@section('page-css')
@endsection

@section('header')
<div class="content-header-left col-md-9 col-12 mb-2">
    <div class="row breadcrumbs-top">
      <div class="col-12">
        <h2 class="content-header-title float-left mb-0">Dashboard</h2>
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Home</a>
            </li>            
          </ol>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')
<section id="dashboard-analytics">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card bg-analytics text-white">
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
    <div class="row">
      <div class="col-4">
        <div class="card text-center">
          <div class="card-content">
            <div class="card-body">
              <div class="avatar bg-rgba-danger p-50 m-0 mb-1">
                <div class="avatar-content">
                  <i class="feather icon-shopping-bag text-danger font-medium-5"></i>
                </div>
              </div>
              <h2 class="text-bold-700">{{ $siswa }}</h2>
              <p class="mb-0">Siswa</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card text-center">
          <div class="card-content">
            <div class="card-body">
              <div class="avatar bg-rgba-danger p-50 m-0 mb-1">
                <div class="avatar-content">
                  <i class="feather icon-shopping-bag text-danger font-medium-5"></i>
                </div>
              </div>
              <h2 class="text-bold-700 text-success">{{ $pembayaran }}</h2>
              <p class="mb-0">Data Pembayaran SPP</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card text-center">
          <div class="card-content">
            <div class="card-body">
              <div class="avatar bg-rgba-danger p-50 m-0 mb-1">
                <div class="avatar-content">
                  <i class="feather icon-shopping-bag text-danger font-medium-5"></i>
                </div>
              </div>
              <h2 class="text-bold-700">{{ $kelas }}</h2>
              <p class="mb-0">Kelas</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>                    
</section>
@endsection

@section('page-vendor-js')
    
@endsection