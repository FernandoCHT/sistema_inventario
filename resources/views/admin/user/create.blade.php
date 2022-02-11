@extends('layouts.admin')
@section('title','Registro de usuario')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Registro de usuarios
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.index')}}">usuarios</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de usuarios</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de usuario</h4>
                    </div>

                    {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}

                    @include('admin.user._form')

                    <button type="submit" class="btn btn-primary ">Registrar</button>
                    <a href="{{url('users')}}" class="btn btn-light">
                        Cancelar
                    </a>

                    {!! Form::close() !!}

                </div>
                {{-- <div class="card-footer text-muted">
                    {{$users->render()}}--}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection