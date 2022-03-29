@extends('layouts.admin')
@section('title','Gestión de productos')
@section('styles')
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
    }
</style>

@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Productos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Productos</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Productos</h4>


                        <div class="btn-gorup">
                            <a href="{{route('products.pdf')}}" class="btn btn-danger btn-icon-text"><i class="far fa-file-pdf"></i> Exportar</a>
                            <a href="{{route ('products.create')}}" class="btn btn-inverse-dark btn-icon-prepend">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                    </div>

                    <br>

                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <!-- 'code',
                                    'nombre',
                                    'stock',
                                    'imagen',
                                    'precio_venta',
                                    'status',
                                    'category_id',
                                    'provider_id', -->
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Stock</th>
                                    <th>Estado</th>
                                    <th>Categoría</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{$product->id}}</th>

                                    <td>
                                        <a href="{{route('products.show',$product)}}">{{$product->nombre}}</a>
                                    </td>

                                    <td>{{$product->stock}}</td>
                                    @if ($product->status == 'ACTIVE')
                                    <td>
                                        <a class="jsgrid-button btn btn-success" href="{{url('change_status/products', $product)}}" title="Editar">
                                            Activo <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="jsgrid-button btn btn-danger" href="{{url('change_status/products', $product)}}" title="Editar">
                                            Desactivado <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    @endif

                                    <td>{{$product->category->nombre}}</td>


                                    <!--Botones de acciones-->
                                    <td>
                                        {!! Form::open(['route'=>['products.destroy',$product], 'method'=>'DELETE']) !!}

                                        <a class="btn btn-sm btn-primary" href="{{route('products.edit', $product)}}" title="Editar">
                                            <i class="far fa-edit"></i> Editar
                                        </a>

                                        <button class="btn btn-sm btn-danger" type="submit" title="Eliminar">
                                            <i class="far fa-trash-alt"></i> Eliminar
                                        </button>

                                        <!--Botones de acciones-->

                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="card-footer text-muted">
                    {{$product->render()}}
            </div> --}}
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection