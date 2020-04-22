@extends('layouts.app')

@section('content')
<a target="_blank" href="{{ route('exportpdf') }}" class="btn btn-danger">Export to PDF</a>
<a target="_blank" href="{{ route('exportexel') }}" class="btn btn-success">Export to Exel</a>
    
@livewire('admin.history-spp-livewire')
@endsection