<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Provider;
use App\Models\Product;

use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Http\Requests\Purchase\StoreRequest;
use App\Http\Requests\Purchase\UpdateRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:purchases.create')->only(['create', 'store']);
        $this->middleware('can:purchases.index')->only(['index']);
        $this->middleware('can:purchases.show')->only(['show']);

        $this->middleware('can:change.status.purchases')->only(['change_status']);
        $this->middleware('can:purchases.pdf')->only(['pdf']);
        $this->middleware('can:upload.purchases')->only(['upload']);
    }

    public function index()
    {
        $purchases = Purchase::get();
        return view('admin.purchase.index', compact('purchases'));
    }
    public function create()
    {
        $providers = Provider::get();
        $products = Product::where('status', 'ACTIVE')->get();
        return view('admin.purchase.create', compact('providers', 'products'));
    }

    public function store(StoreRequest $request)
    {

        $purchase = Purchase::create($request->all() + [
            'user_id' => Auth::user()->id,
            'fecha_compra' => Carbon::now('America/Mexico_City'),
        ]);

        foreach ($request->id_producto as $key => $product) {
            $results[] = array(
                "id_producto" => $request->id_producto[$key],
                "cantidad" => $request->cantidad[$key], "precio" => $request->precio[$key]
            );
        }
        $purchase->purchaseDetails()->createMany($results);

        return redirect()->action([PurchaseController::class, 'index']);
    }

    public function show(Purchase $purchase)
    {

        $subtotal = 0;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->cantidad * $purchaseDetail->precio;
        }
        return view('admin.purchase.show', compact('purchase', 'purchaseDetails', 'subtotal'));
    }

    public function edit(Purchase $purchase)
    {
        $providers = Provider::get();
        return view('admin.purchase.edit', compact('purchase'));
    }

    public function update(UpdateRequest $request, Purchase $purchase)
    {
        //$purchase->update($request->all());
        //return redirect()->route('purchases.index');
    }

    public function destroy(Purchase $purchase)
    {
        //$purchase->delete();
        //return redirect()->route('purchases.index');
    }

    public function pdf(Purchase $purchase)
    {
        $subtotal = 0;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->cantidad * $purchaseDetail->precio;
        }

        $pdf = PDF::loadView('admin.purchase.pdf', compact('purchase', 'subtotal', 'purchaseDetails'));
        return $pdf->download('Reporte_de_compra_' . $purchase->id . '.pdf');
    }

    public function upload(Request $request, Purchase $purchase)
    {

        //$purchase->update($request->all());
        //return redirect()->route('purchases.index');
    }

    public function change_status(Purchase $purchase)
    {
        if ($purchase->status == 'VALIDADO') {
            $purchase->update(['status' => 'CANCELADO']);
            return redirect()->back();
        } else {
            $purchase->update(['status' => 'VALIDADO']);
            return redirect()->back();
        }
    }
}
