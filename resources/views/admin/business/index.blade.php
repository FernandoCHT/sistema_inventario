@extends('layouts.admin')
@section('title','Gestión de empresa')
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
            Gestión de empresa
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Gestión de empresa</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Gestión de empresa</h4>
                        {{-- <i class="fas fa-ellipsis-v"></i>  --}}
                        {{-- <div class="btn-group">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="{{route('clients.create')}}" class="dropdown-item">Agregar</a>
                        business
                    </div>
                </div> --}}
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <strong><i class="fas fa-file-signature mr-1"></i> Nombre </strong>

                    <p class="text-muted">
                        {{$business->nombre}}
                    </p>
                    <hr>
                    <strong><i class="fas fa-align-left mr-1"></i> Descripción</strong>

                    <p class="text-muted">
                        {{$business->descripcion}}
                    </p>
                    <hr>
                    <strong><i class="fas fa-map-marked-alt mr-1"></i> Dirección</strong>

                    <p class="text-muted">
                        {{$business->direccion}}
                    </p>
                    <hr>
                    {{-- <strong><i class="fas fa-mobile-alt mr-1"></i> Teléfono</strong>
                            
                            <p class="text-muted">{{$business->telefono}}</p>
                    <hr> --}}
                </div>
                <div class="form-group col-md-6">
                    <strong><i class="far fa-address-card mr-1"></i> RUC</strong>

                    <p class="text-muted">{{$business->rfc}}</p>
                    <hr>
                    <strong><i class="far fa-envelope mr-1"></i> Correo electrónico</strong>

                    <p class="text-muted">{{$business->correo}}</p>
                    <hr>
                    {{-- <strong><i class="far fa-calendar-check mr-1"></i> Fecha de alta</strong>
                           
                            <p class="text-muted">{{$business->discharge_date}}</p>
                    <hr> --}}
                    <div class="row">
                        <div class="col-md-6">
                            <strong><i class="fas fa-exclamation-circle mr-1"></i> Logo</strong><br>
                        </div>
                        <div class="col-md-6">
                            <img style="width:50px ; height:50px ;" src="{{asset('image/'.$business->logo)}}" class="rounded float-left" alt="logo">
                        </div>
                    </div>
                    <hr>
                </div>
            </div>

        </div>
        <div class="card-footer text-muted">

            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal-2">Actualizar</button>

        </div>
    </div>
</div>
</div>
</div>


<div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-2">Actualizar datos de empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            {!! Form::model($business,['route'=>['business.update',$business], 'method'=>'PUT','files' => true]) !!}


            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="name" value="{{$business->nombre}}" aria-describedby="helpId">
                </div>

                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control" name="descripcion" id="description" rows="3">{{$business->descripcion}}</textarea>
                </div>

                <div class="form-group">
                    <label for="mail">Correo electrónico</label>
                    <input type="email" class="form-control" name="correo" id="mail" value="{{$business->correo}}" aria-describedby="helpId">
                </div>

                <div class="form-group">
                    <label for="address">Dirección</label>
                    <input type="text" class="form-control" name="direccion" id="address" value="{{$business->direccion}}" aria-describedby="helpId">
                </div>

                <div class="form-group">
                    <label for="ruc">Numero de RUC</label>
                    <input type="text" class="form-control" name="rfc" id="ruc" value="{{$business->rfc}}" aria-describedby="helpId">
                </div>

                <div class="card-body">
                    <h5 class="card-title d-flex">Logo
                        <small class="ml-auto align-self-end">
                            <a href="dropify.html" class="font-weight-light" target="_blank">Seleccionar Archivo</a>
                        </small>
                    </h5>
                    <input type="file" name="picture" id="picture" class="dropify" />
                </div>


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Actualizar</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
{!! Html::script('melody/js/dropify.js') !!}
@endsection