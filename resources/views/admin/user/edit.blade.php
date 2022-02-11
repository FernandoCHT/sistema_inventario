@extends('layouts.admin')
@section('title','Asignar rol')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')

@if(session('info'))
<div class="alert alert-success" role="alert">
    <strong>{{session('info')}}</strong>
</div>
@endif
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Editar categoría
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios</a></li>
                <li class="breadcrumb-item active" aria-current="page">Asignar rol</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Asignar rol</h4>
                    </div>
                    {!! Form::model($user,['route' => ['users.update',$user], 'method'=>'PUT']) !!}


                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="nombre" value="{{$user->name}}" class="form-control" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Email</label>
                        <input type="text" name="email" id="email" value="{{$user->email}}" class="form-control" placeholder="Nombre" required>
                    </div>
                    <h2 class="h5">Listado de roles</h2>
                    @foreach($roles as $role)
                    <div class="form-group">
                        <label for="">
                            {!! Form::checkbox('roles[]',$role->id, null, ['class' => 'mr-1']) !!}
                            {{$role->name}}
                        </label>
                    </div>
                    @endforeach


                    <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                    <a href="{{url('users')}}" class="btn btn-light">
                        Cancelar
                    </a>
                    {!! Form::close() !!}
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