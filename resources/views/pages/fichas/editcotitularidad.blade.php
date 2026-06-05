@extends('layout.master')
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card" >
        @livewire('ficha-cotitularidad-edit',["fichaanterior"=>$fichaanterior,"total"=>$total])
    </div>
</div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
@endpush
