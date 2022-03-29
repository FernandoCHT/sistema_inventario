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

                        <div class="btn-gorup">
                            <a href="{{route ('sales.create')}}" class="btn btn-inverse-dark btn-icon-prepend">
                                <i class="fas fa-plus"></i> Agregar
                            </a>
                        </div>
                    </div>

                    <br>

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
                                    <th>Exportar</th>
                                    <th>Ver detalle</th>

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
                                    <td>
                                        <a href="{{url('sales/pdf', $sale)}}" class="btn btn-danger btn-icon-text"><i class="far fa-file-pdf"></i></a>

                                        <a href="" class="btn btn-success btn-icon-text"><i class="far fa-file-excel"></i></a>
                                    </td>

                                    <td>
                                        <a href="{{route('sales.show', $sale)}}" class="btn btn-info btn-icon-text"><i class="far fa-eye"></i></a>
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