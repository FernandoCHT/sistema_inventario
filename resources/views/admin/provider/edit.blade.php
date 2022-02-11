@extends('layouts.admin')
@section('title','Editar Proveedor')
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
            Edición de proveedores
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('providers.index')}}">Proveedores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edición de proveedores</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar proveedor</h4>
                    </div>

                    {!! Form::model($provider,['route'=>['providers.update',$provider], 'method'=>'PUT']) !!}


                    <div class="form-group">
                        <label for="my-input">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" value="{{$provider->nombre}}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Corrreo electrónico</label>
                        <input id="email" class="form-control" type="email" name="email" placeholder="ejemplo@gmail.com" value="{{$provider->email}}" required>
                    </div>

                    <div class="form-group">
                        <label for="id_numero">numero id</label>
                        <input id="id_numero" class="form-control" type="number" name="id_numero" value="{{$provider->id_numero}}">
                    </div>

                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input id="direccion" class="form-control" type="text" name="direccion" value="{{$provider->direccion}}" required>
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input id="telefono" class="form-control" type="number" name="telefono" value="{{$provider->telefono}}" required>
                    </div>

                    <button type="submit" class="btn btn-primary ">Actualizar</button>
                    <a href="{{route('providers.index')}}" class="btn btn-light">
                        Cancelar
                    </a>

                    {!! Form::close() !!}

                </div>
                {{-- <div class="card-footer text-muted">
                    {{$providers->render()}}--}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection