<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comprasmes = DB::select('SELECT month(c.fecha_compra) as mes, sum(c.total) as totalmes from purchases c where c.status="VALIDADO" group by month(c.fecha_compra) order by month(c.fecha_compra) desc limit 12');
        $ventasmes = DB::select('SELECT month(v.fecha_venta) as mes, sum(v.total) as totalmes from sales v where v.status="VALIDADO" group by month(v.fecha_venta) order by month(v.fecha_venta) desc limit 12');

        $ventasdia = DB::select('SELECT DATE_FORMAT(v.fecha_venta,"%d/%m/%Y") as dia, sum(v.total) as totaldia from sales v where v.status="VALIDADO" group by v.fecha_venta order by day(v.fecha_venta) desc limit 15');
        $totales = DB::select('SELECT (select ifnull(sum(c.total),0) from purchases c where DATE(c.fecha_compra)=curdate() and c.status="VALIDADO") as totalcompra, (select ifnull(sum(v.total),0) from sales v where DATE(v.fecha_venta)=curdate() and v.status="VALIDADO") as totalventa');

        $productosvendidos = DB::select('SELECT p.code as code, 
        sum(dv.cantidad) as quantity, p.nombre as name , p.id as id , p.stock as stock from products p 
        inner join sale_details dv on p.id=dv.id_producto 
        inner join sales v on dv.sale_id=v.id where v.status="VALIDADO" 
        and year(v.fecha_venta)=year(curdate()) 
        group by p.code ,p.nombre, p.id , p.stock order by sum(dv.cantidad) desc limit 10');


        return view('home', compact('comprasmes', 'ventasmes', 'ventasdia', 'totales', 'productosvendidos'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
