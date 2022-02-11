<div class="form-row">
    <div class="form-group col-md-8">
        <div class="form-group">
            <label for="provider_id">Proveedor</label>
            <select class="form-control" name="provider_id" id="provider_id">
                @foreach ($providers as $provider)
                <option value="{{$provider->id}}">{{$provider->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group col-md-4">
        <label for="tax">Impuesto</label>
        <div class="input-group">

            <div class="input-group-preMXNd">
                <span class="input-group-text" id="basic-addon3">%</span>
            </div>
            <input type="number" class="form-control" name="tax" id="tax" aria-describedby="basic-addon3" placeholder="16">
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <div class="form-group">
            <label for="id_producto">Producto</label>
            {{-- <select class="form-control selectpicker" data-live-search="true" name="id_producto" id="id_producto">  --}}
            <select class="form-control" name="id_producto" id="id_producto">
                <option value="" disabled selected>Selecccione un producto</option>
                @foreach ($products as $product)
                <option value="{{$product->id}}">{{$product->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" name="cantidad" id="cantidad" aria-describedby="helpId">
        </div>
    </div>

    <div class="form-group col-md-2">
        <div class="form-group">
            <label for="precio">Precio de compra</label>
            <input type="number" class="form-control" name="precio" id="precio" aria-describedby="helpId">
        </div>
    </div>
</div>



<div class="form-group ">
    <button class="btn btn-primary float-right" type="button" id="agregar">Agregar producto</button>
</div>

<div class="form-group">
    <h4 class="card-title">Detalles de compra</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio(MXN)</th>
                    <th>Cantidad</th>
                    <th>SubTotal(MXN)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total">MXN 0.00</span> </p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL IMPUESTO (18%):</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">MXN 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL PAGAR:</p>
                    </th>
                    <th>
                        <p align="right"><span align="right" id="total_pagar_html">MXN 0.00</span> <input type="hidden" name="total" id="total_pagar"></p>
                    </th>
                </tr>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
</div>