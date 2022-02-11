@extends('layouts.admin')
@section('title','Registrar Producto')
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
            Registro de productos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de productos</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registra nuevo producto</h4>
                    </div>

                    <!-- 'code',
                                    'nombre',
                                    'stock',
                                    'imagen',
                                    'precio_venta',
                                    'status',
                                    'category_id',
                                    'provider_id', -->

                    {!! Form::open(['route'=>'products.store', 'method'=>'POST','files' => true]) !!}


                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" required>
                    </div>

                    <div class="form-group">
                        <label for="precio_venta">Precio de venta</label>
                        <input id="precio_venta" class="form-control" type="number" name="precio_venta" required>
                    </div>

                    <div class="form-group">
                        <label for="category_id">Categoría</label>
                        <select id="category_id" class="form-control" name="category_id">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->nombre}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="provider_id">Proveedor</label>
                        <select id="provider_id" class="form-control" name="provider_id">
                            @foreach($providers as $provider)
                            <option value="{{$provider->id}}">{{$provider->nombre}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="card-body">
                        <h4 class="card-title d-flex">Imagen de producto
                            <small class="ml-auto align-self-end">
                                <a href="dropify.html" class="font-weight-light" target="_blank">Seleccionar Archivo</a>
                            </small>
                        </h4>
                        <input type="file" name="picture" id="picture" class="dropify" />
                    </div>


                    <button type="submit" class="btn btn-primary ">Registrar</button>
                    <a href="{{route('products.index')}}" class="btn btn-light">
                        Cancelar
                    </a>

                    {!! Form::close() !!}

                </div>
                {{-- <div class="card-footer text-muted">
                    {{$products->render()}}--}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/dropify.js') !!}

@endsection