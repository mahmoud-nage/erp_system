@extends('index')

@section('title')
    {{__('lang.admins')}}
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        <h1 >{{__('lang.admins')}}</h1><br>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div>
            <div class="row">
                <div class="col-sm-12">
                    {!! $dataTable->table([], true) !!}
                </div></div></div></div></div>
@endsection

@push('scripts')
    {{$dataTable->scripts()}}
@endpush
