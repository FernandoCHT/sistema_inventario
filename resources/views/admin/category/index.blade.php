@extends('layouts.admin')
@section('title','Gestión de categorías')
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
            Categorías
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categorías</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Categorías</h4>
                        <div class="btn-gorup">
                            <a href="{{route ('categories.create')}}" class="btn btn-inverse-dark btn-icon-prepend">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{$category->id}}</th>
                                    <td>
                                        <a href="{{route('categories.show',$category)}}">{{$category->nombre}}</a>
                                    </td>
                                    <td>{{$category->descripcion}}</td>
                                    <td>
                                        {!! Form::open(['route'=>['categories.destroy',$category], 'method'=>'DELETE']) !!}

                                        <a class="btn btn-sm btn-primary" href="{{route('categories.edit', $category)}}" title="Editar">
                                            <i class="far fa-edit"></i> Editar
                                        </a>

                                        <button class="btn btn-sm btn-danger" type="submit" title="Eliminar">
                                            <i class="far fa-trash-alt"></i> Eliminar
                                        </button>

                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="card-footer text-muted">
                    {{$categories->render()}}
            </div> --}}
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection