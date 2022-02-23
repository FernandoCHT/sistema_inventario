@extends('layouts.admin')
@section('title','Gestión de compras')
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
            Compras
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Compras</li>
            </ol>
        </nav>
    </div>





    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <h4 class="card-title">Compras</h4>
                        <div class="btn-gorup">
                            <a href="{{route ('purchases.create')}}" class="btn btn-inverse-dark btn-icon-prepend">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>

                    </div>
                    <br>

                    <div class="table-responsive ">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <!-- 'id_proveedor',
                                    'id_user',
                                    'fecha_compra',
                                    'total',
                                    'status',
                                    'imagen', -->

                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>Exportar</th>
                                    <th>Ver detalle</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchases as $purchase)
                                <tr>
                                    <th scope="row"><a href="{{route('purchases.show', $purchase)}}">{{$purchase->id}}</a></th>
                                    <td>{{$purchase->fecha_compra}}</td>
                                    <td>{{$purchase->total}}</td>
                                    @if ($purchase->status == 'VALIDADO')
                                    <td>

                                        <a class="jsgrid-button btn btn-success" href="{{url('change_status/purchases', $purchase)}}" title="Editar">
                                            Activo <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="jsgrid-button btn btn-danger" href="{{url('change_status/purchases', $purchase)}}" title="Editar">
                                            Cancelado <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    @endif
                                    <td>


                                        <!-- <a class="jsgrid-button jsgrid-edit-button" href="{{route('purchases.edit', $purchase)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a> -->

                                        <!-- <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button> -->
                                        <a href="{{url('purchases/pdf', $purchase)}}" class="btn btn-danger btn-icon-text"><i class="far fa-file-pdf"></i></a>


                                        <a href="" class="btn btn-success btn-icon-text"><i class="far fa-file-excel"></i></a>

                                    </td>

                                    <td><a href="{{route('purchases.show', $purchase)}}" class="btn btn-info btn-icon-text"><i class="far fa-eye"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="card-footer text-muted">
                    {{$purchases->render()}}
            </div> --}}
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection