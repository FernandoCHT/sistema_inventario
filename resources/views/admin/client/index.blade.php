@extends('layouts.admin')
@section('title','Gestión de clientes')
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
            Clientes
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Clientes</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Clientes</h4>
                        <div class="btn-gorup">
                            <a href="{{route ('clients.create')}}" class="btn btn-inverse-dark btn-icon-prepend">
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
                                    <th>Teléfono / Celular</th>
                                    <th>Correo electrónico</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                <tr>
                                    <th scope="row">{{$client->id}}</th>

                                    <td>
                                        <a href="{{route('clients.show',$client)}}">{{$client->nombre}}</a>
                                    </td>


                                    <td>{{$client->telefono}}</td>
                                    <td>{{$client->email}}</td>


                                    <!--Botones de acciones-->
                                    <td>
                                        {!! Form::open(['route'=>['clients.destroy',$client], 'method'=>'DELETE']) !!}

                                        <a class="btn btn-sm btn-primary" href="{{route('clients.edit', $client)}}" title="Editar">
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
                    {{$client->render()}}
            </div> --}}
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection