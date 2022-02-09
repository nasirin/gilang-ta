<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tansaksiDetail;
use App\Models\transaksi;
use App\Models\produk;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $data = $request->all();
        $data['kasir_id'] = session('id');
        // $transaksi = transaksi::create($data);
        $produk = produk::find($request['produk_id']);
        $detail = [
            'transaksi_id' => $request['transaksi_id'],
            'produk_id' => $request['produk_id'],
            'qty' => $request['qty'],
            'keterangan' => $request['keterangan'],
            'total' => intval($request['qty'] * $produk['harga']),
        ];
        tansaksiDetail::create($detail);
        toastr()->success('Data berhasil di tambah');
        return redirect('basket/' . $request['transaksi_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $detail = tansaksiDetail::with('transaksi', 'produk')->whereRelation('transaksi', 'id', '=', $id)->get();
        // $transaksi = transaksi::with('detail')->whereRelation('transa')->get();
        $data = [
            'detail' => tansaksiDetail::with('transaksi', 'produk')->whereRelation('transaksi', 'id', '=', $id)->get(),
            'transaksi' => transaksi::find($id),
            'produk' => produk::all()
        ];
        // return response()->json($data);
        return view('pages.transaksi.basket', $data);
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
        // $detail = tansaksiDetail::find($id);
        // // dd($detail);
    }
}
