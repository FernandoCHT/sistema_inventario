@extends('layouts.admin')
@section('title','Gestión de Ventas')
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
            Ventas
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ventas</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Ventas</h4>

                        <div class="btn-group">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('sales.create')}}" class="dropdown-item">Registrar</a>


                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <!--  '
                                        '',
                                        'tax',
                                        '',
                                        '',
                                         -->

                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th style="width: 50px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $sale)
                                <tr>
                                    <th scope="row"><a href="{{route('sales.show', $sale)}}">{{$sale->id}}</a></th>
                                    <td>{{$sale->fecha_venta}}</td>
                                    <td>{{$sale->total}}</td>

                                    @if ($sale->status == 'VALIDADO')
                                    <td>
                                        <a class="jsgrid-button btn btn-success" href="{{url('change_status/sales', $sale)}}" title="Editar">
                                            Activo <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="jsgrid-button btn btn-danger" href="{{url('change_status/sales', $sale)}}" title="Editar">
                                            Cancelado <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    @endif
                                    <td style="width: 50px;">


                                        <!-- <a class="jsgrid-button jsgrid-edit-button" href="{{route('sales.edit', $sale)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a> -->

                                        <!-- <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button> -->
                                        <a href="{{url('sales/pdf', $sale)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-file-pdf"></i></a>
                                        <a href="{{route('sales.show', $sale)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>
                                        <a href="" class="jsgrid-button jsgrid-edit-button"><i class="fas fa-print"></i></a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="card-footer text-muted">
                    {{$sales->render()}}
            </div> --}}
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection