<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\tansaksiDetail;
use App\Models\transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'produk' => produk::all(),
            'detail' => tansaksiDetail::with('transaksi', 'produk')->get()
        ];
        return view('pages.transaksi', $data);
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
        if (!$request['produk_already']) {
            $data = $request->all();
            $data['kasir_id'] = session('id');
            $transaksi = transaksi::create($data);
            $produk = produk::find($request['produk_id']);
            $detail = [
                'transaksi_id' => $transaksi['id'],
                'produk_id' => $request['produk_id'],
                'qty' => $request['qty'],
                'keterangan' => $request['keterangan'],
                'total' => intval($request['qty'] * $produk['harga']),
            ];
            tansaksiDetail::create($detail);
            toastr()->success('Data berhasil di tambah');
            return redirect()->back();
        } else {
            $produk = produk::find($request['produk_id']);
            $detail = [
                'transaksi_id' => $request['produk_already'],
                'produk_id' => $request['produk_id'],
                'qty' => $request['qty'],
                'keterangan' => $request['keterangan'],
                'total' => intval($request['qty'] * $produk['harga']),
            ];
            tansaksiDetail::create($detail);
            toastr()->success('Data berhasil di tambah');
            return redirect()->back();
        }
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
        $transaksi = transaksi::find($id);
        $data['status'] = 'success';
        $transaksi->fill($data);
        $transaksi->save();
        toastr()->success('Order berhasil');
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
        $transaksi = transaksi::find($id);
        $transaksi->delete();
        toastr()->success('Data berhasil di hapus');
        return redirect()->back();
    }
}
