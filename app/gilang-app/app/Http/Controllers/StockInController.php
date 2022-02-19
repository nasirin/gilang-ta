<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\distributor;
use App\Models\stockin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StockInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $data = $request->all();
        $rule = [
            'barang' => 'required',
            "distributor" => 'required',
            "qty" => 'required',
            "harga" => 'required',
            "status" => 'required',
        ];
        
        $validate = Validator::make($data, $rule);
        if ($validate->fails()) {
            return response()->json([
                'stauts' => 'error',
                'message' => $validate->errors()
            ]);
        }
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
        $stockin->fill($request->all());
        $stockin->save();
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
        $stockin->delete();
        toastr()->success('Data stok terhapus');
        return redirect()->back();
    }
}
