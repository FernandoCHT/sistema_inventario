@extends('layouts.admin')
@section('title','Registro de venta')
@section('styles')
{!! Html::style('select/dist/css/bootstrap-select.min.css') !!}
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
            Registro de venta
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('sales.index')}}">ventas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de venta</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de venta</h4>
                    </div>

                    {!! Form::open(['route' => 'sales.store', 'method' => 'POST']) !!}

                    @include('admin.sale._form')

                    <div class="card-footer text-muted">
                        <button type="submit" id="guardar" class="btn btn-primary ">Registrar</button>
                        <a href="{{route('sales.index')}}" class="btn btn-light">
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
        var cont = 1;
        total = 0;
        subtotal = [];
        $("#guardar").hide();
        $("#id_producto").change(mostrarValores);

        function mostrarValores() {
            datosProducto = document.getElementById('id_producto').value.split('_');
            $("#precio").val(datosProducto[2]);
            $("#stock").val(datosProducto[1]);
        }

        var id_producto = $('#id_producto');

        id_producto.change(function() {
            $.ajax({
                url: "{{url('get_products_by_id')}}",
                method: 'GET',
                data: {
                    id_producto: $('#id_producto').val(),
                },
                success: function(data) {
                    $("#precio").val(data.precio_venta);
                    $("#stock").val(data.stock);
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
                    $("#precio").val(data.precio_venta);
                    $("#stock").val(data.stock);
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
            datosProducto = document.getElementById('id_producto').value.split('_');
            id_producto = datosProducto[0];
            producto = $("#id_producto option:selected").text();
            cantidad = $("#cantidad").val();
            descuento = $("#descuento").val();
            precio = $("#precio").val();
            stock = $("#stock").val();
            impuesto = $("#tax").val();
            if (id_producto != "" && cantidad != "" && cantidad > 0 && descuento != "" && precio != "") {
                if (parseInt(stock) >= parseInt(cantidad)) {
                    subtotal[cont] = (cantidad * precio) - (cantidad * precio * descuento / 100);
                    total = total + subtotal[cont];
                    var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="id_producto[]" value="' + id_producto + '">' + producto + '</td> <td> <input type="hidden" name="precio[]" value="' + parseFloat(precio).toFixed(2) + '"> <input class="form-control" type="number" value="' + parseFloat(precio).toFixed(2) + '" disabled> </td> <td> <input type="hidden" name="descuento[]" value="' + parseFloat(descuento) + '"> <input class="form-control" type="number" value="' + parseFloat(descuento) + '" disabled> </td> <td> <input type="hidden" name="cantidad[]" value="' + cantidad + '"> <input type="number" value="' + cantidad + '" class="form-control" disabled> </td> <td align="right">s/' + parseFloat(subtotal[cont]).toFixed(2) + '</td></tr>';
                    cont++;
                    limpiar();
                    totales();
                    evaluar();
                    $('#detalles').append(fila);
                } else {
                    Swal.fire({
                        type: 'error',
                        text: 'La cantidad a vender supera el stock.',
                    })
                }
            } else {
                Swal.fire({
                    type: 'error',
                    text: 'Rellene todos los campos del detalle de la venta.',
                })
            }
        }

        function limpiar() {
            $("#cantidad").val("");
            $("#descuento").val("0");
        }

        function totales() {
            $("#total").html("MXN " + total.toFixed(2));
            total_impuesto = total * impuesto / 100;
            total_pagar = total + total_impuesto;
            $("#total_impuesto").html("MXN " + total_impuesto.toFixed(2));
            $("#total_pagar_html").html("MXN" + total_pagar.toFixed(2));
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
            $("#total").html("PEN" + total);
            $("#total_impuesto").html("PEN" + total_impuesto);
            $("#total_pagar_html").html("PEN" + total_pagar_html);
            $("#total_pagar").val(total_pagar_html.toFixed(2));
            $("#fila" + index).remove();
            evaluar();
        }
    </script>


    @endsection