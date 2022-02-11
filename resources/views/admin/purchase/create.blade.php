@extends('layouts.admin')
@section('title','Registro de compra')
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
            Registro de compra
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('purchases.index')}}">Compras</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de compra</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de compra</h4>
                    </div>

                    {!! Form::open(['route' => 'purchases.store', 'method' => 'POST']) !!}

                    @include('admin.purchase._form')

                    <div class="card-footer text-muted">
                        <button type="submit" id="guardar" class="btn btn-primary ">Registrar</button>
                        <a href="{{route('purchases.index')}}" class="btn btn-light">
                            Cancelar
                        </a>
                    </div>


                    {!! Form::close() !!}

                </div>

            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    {!! Html::script('melody/js/alerts.js') !!}
    {!! Html::script('melody/js/avgrund.js') !!}
    {!! Html::script('select/dist/js/bootstrap-select.min.js') !!}
    {!! Html::script('js/sweetalert2.all.min.js') !!}

    <script>
        $(document).ready(function() {
            $("#agregar").click(function() {
                agregar();
            });
        });

        var cont = 0;
        total = 0;
        subtotal = [];

        $("#guardar").hide();

        var id_producto = $('#id_producto');
        id_producto.change(function() {
            $.ajax({
                url: "{{url('get_products_by_id')}}",
                method: 'GET',
                data: {
                    id_producto: id_producto.val(),
                },
                success: function(data) {
                    $("#code").val(data.code);
                }
            });
        });
        $(obtener_registro());

        function obtener_registro(code) {
            $.ajax({
                url: "{{url('get_products_by_barcode')}}",
                type: 'GET',
                data: {
                    code: code
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $("#id_producto").val(data.id);
                }
            });
        }
        $(document).on('keyup', '#code', function() {
            var valorResultado = $(this).val();
            if (valorResultado != "") {
                obtener_registro(valorResultado);
            } else {
                obtener_registro();
            }
        })

        function agregar() {

            id_producto = $("#id_producto").val();
            producto = $("#id_producto option:selected").text();
            cantidad = $("#cantidad").val();
            precio = $("#precio").val();
            impuesto = $("#tax").val();

            if (id_producto != "" && cantidad != "" && cantidad > 0 && precio != "") {
                subtotal[cont] = cantidad * precio;
                total = total + subtotal[cont];
                var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"><i class="fa fa-times"></i></button></td> <td><input type="hidden" name="id_producto[]" value="' + id_producto + '">' + producto + '</td> <td> <input type="hidden" id="precio[]" name="precio[]" value="' + precio + '"> <input class="form-control" type="number" id="precio[]" value="' + precio + '" disabled> </td>  <td> <input type="hidden" name="cantidad[]" value="' + cantidad + '"> <input class="form-control" type="number" value="' + cantidad + '" disabled> </td> <td align="right">$/' + subtotal[cont] + ' </td></tr>';
                cont++;
                limpiar();
                totales();
                evaluar();
                $('#detalles').append(fila);
            } else {
                Swal.fire({
                    type: 'error',
                    text: 'Rellene todos los campos del detalle de la compras',

                })
            }
        }

        function limpiar() {
            $("#cantidad").val("");
            $("#precio").val("");
        }

        function totales() {
            $("#total").html("MXN " + total.toFixed(2));
            total_impuesto = total * impuesto / 100;
            total_pagar = total + total_impuesto;
            $("#total_impuesto").html("MXN " + total_impuesto.toFixed(2));
            $("#total_pagar_html").html("MXN " + total_pagar.toFixed(2));
            $("#total_pagar").val(total_pagar.toFixed(2));
        }

        function evaluar() {
            if (total > 0) {
                $("#guardar").show();
            } else {
                $("#guardar").hide();
            }
        }

        function eliminar(index) {
            total = total - subtotal[index];
            total_impuesto = total * impuesto / 100;
            total_pagar_html = total + total_impuesto;
            $("#total").html("MXN" + total);
            $("#total_impuesto").html("MXN" + total_impuesto);
            $("#total_pagar_html").html("MXN" + total_pagar_html);
            $("#total_pagar").val(total_pagar_html.toFixed(2));
            $("#fila" + index).remove();
            evaluar();
        }
    </script>
    @endsection