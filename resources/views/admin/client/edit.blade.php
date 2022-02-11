@extends('layouts.admin')
@section('title','Editar Cliente')
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
            Edición de clientes
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edición de clientes</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Edita producto</h4>
                    </div>

                    <!-- 'code',
                                    'nombre',
                                    'stock',
                                    'imagen',
                                    'precio_venta',
                                    'status',
                                    'category_id',
                                    'provider_id', -->

                    {!! Form::model($client,['route'=>['clients.update',$client], 'method'=>'PUT']) !!}



                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" value="{{$client->nombre}}" required>
                    </div>

                    <div class="form-group">
                        <label for="rfc">RCF</label>
                        <input id="rfc" class="form-control" type="text" name="rfc" value="{{$client->rfc}}">
                        <small id="sm" class="form-text text-muted">El campo es opcional</small>
                    </div>

                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input id="direccion" class="form-control" type="text" name="direccion" value="{{$client->direccion}}">
                        <small id="sm" class="form-text text-muted">El campo es opcional</small>
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input id="telefono" class="form-control" type="number" name="telefono" value="{{$client->telefono}}">
                        <small id="sm" class="form-text text-muted">El campo es opcional</small>
                    </div>

                    <div class="form-group">
                        <label for="email">email</label>
                        <input id="email" class="form-control" type="email" name="email" value="{{$client->email}}">
                        <small id="sm" class="form-text text-muted">Este campo es opcional</small>
                    </div>


                    <button type="submit" class="btn btn-primary ">Editar</button>
                    <a href="{{route('clients.index')}}" class="btn btn-light">
                        Cancelar
                    </a>

                    {!! Form::close() !!}

                </div>
                {{-- <div class="card-footer text-muted">
                    {{$clients->render()}}--}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/dropify.js') !!}

@endsection