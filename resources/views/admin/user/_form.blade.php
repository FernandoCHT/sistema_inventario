<div class="form-group">
    <label for="name">Nombre</label>
    <input id="name" class="form-control" type="text" name="name">
</div>

<div class="form-group">
    <label for="email">Correo electrónico</label>
    <input id="email" class="form-control" type="email" name="email">
</div>

<div class="form-group">
    <label for="password">Contraseña</label>
    <input id="password" class="form-control" type="password" name="password">
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