<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\distributor;
use App\Models\stockin;
use Illuminate\Http\Request;

class StockInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $stockin = stockin::with('barang', 'distributor')->where('status', 'uncheck')->get();
        // return response()->json($stockin);
        // $barang = barang::with('stockin')->get();
        $data = [
            'stockin' => stockin::with('barang', 'distributor')->where('status', 'uncheck')->get(),
            'stockinChecked' => stockin::with('barang', 'distributor')->where('status', 'checked')->get(),
            'distributor' => distributor::all(),
            'barang' => barang::all(),
        ];

        // dd($data);

        return view('pages.stockin', $data);
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
        // dd($request->all());
        stockin::create($request->all());
        toastr()->success('Data berhasil di tambah');
        return redirect()->back();
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
        $stockin = stockin::find($id);
        $barang = barang::find($request->barang);
        $dataBarang['qty'] = intval($barang['qty'] + $request['qty']);
        $dataStockin['status'] = $request['status'];
        $stockin->fill($dataStockin);
        $stockin->save();
        $barang->fill($dataBarang);
        $barang->save();
        toastr()->success('Stok sudah di periksa');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stockin = stockin::find($id);

        if ($stockin->status == 'checked') {
            $barang = barang::find($stockin->barang_id);
            $dataBarang['qty'] = intval($barang['qty'] - $stockin['qty_masuk']);
            $barang->fill($dataBarang);
            $barang->save();
        }

        $stockin->delete();
        toastr()->success('Data stok terhapus');
        return redirect()->back();
    }
}
