<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Client;
use App\Models\Product;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Http\Requests\Sale\StoreRequest;
use App\Http\Requests\Sale\UpdateRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Barryvdh\DomPDF\Facade as PDF;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sales = Sale::get();
        return view('admin.sale.index', compact('sales'));
    }
    public function create()
    {
        $clients = Client::get();
        $products = Product::get();
        return view('admin.sale.create', compact('clients', 'products'));
    }

    public function store(StoreRequest $request)
    {
        $sale = Sale::create($request->all()  + [
            'user_id' => Auth::user()->id,
            'fecha_venta' => Carbon::now('America/Mexico_City'),
        ]);


        foreach ($request->id_producto as $key => $product) {
            $results[] = array(
                "id_producto" => $request->id_producto[$key],
                "cantidad" => $request->cantidad[$key], "precio" => $request->precio[$key],
                "descuento" => $request->descuento[$key]
            );
        }
        $sale->saleDetails()->createMany($results);

        return redirect()->action([SaleController::class, 'index']);
    }

    public function show(Sale $sale)
    {
        $subtotal = 0;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->cantidad * $saleDetail->precio - $saleDetail->cantidad * $saleDetail->precio * $saleDetail->descuento / 100;
        }
        return view('admin.sale.show', compact('sale', 'saleDetails', 'subtotal'));
    }

    public function edit(Sale $sale)
    {
        $clients = Client::get();
        return view('admin.sale.edit', compact('sale'));
    }

    public function update(UpdateRequest $request, Sale $sale)
    {
        //$sale->update($request->all());
        //return redirect()->route('sales.index');
    }

    public function destroy(Sale $sale)
    {
        //$sale->delete();
        //return redirect()->route('sales.index');
    }

    public function pdf(Sale $sale)
    {
        $subtotal = 0;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->cantidad * $saleDetail->precio - $saleDetail->cantidad * $saleDetail->precio * $saleDetail->descuento / 100;
        }

        $pdf = PDF::loadView('admin.sale.pdf', compact('sale', 'subtotal', 'saleDetails'));
        return $pdf->download('Reporte_de_venta_' . $sale->id . '.pdf');
    }

    public function change_status(Sale $sale)
    {

        if ($sale->status == 'VALIDADO') {
            $sale->update(['status' => 'CANCELADO']);
            return redirect()->back();
        } else {
            $sale->update(['status' => 'VALIDADO']);
            return redirect()->back();
        }
    }
}
